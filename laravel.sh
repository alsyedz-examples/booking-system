#!/bin/bash

set -e

ARG1=$1
APP_CONTAINER=$(docker compose ps --format '{{.Name}}' app)
for arg in "$@"; do
   case "$arg" in
      --with-dev*) WITH_DEV=true ;;
#      name=*) WITH_DEV="${arg#*=}" ;;
   esac
done

no_container_running() {
  echo "Please make sure project has been initialized and containers are running."
  exit 1 # terminate and indicate error
}

case $ARG1 in
  init)
    test -f .env || cp .env.example .env
    test -f project/.env || cp project/.env.example project/.env
    ./laravel.sh start
    ./laravel.sh install-dependencies
    test ! "$(grep "^APP_KEY=$" project/.env)" || ./laravel.sh generate-app-key;
    ./laravel.sh migrate
    ./laravel.sh stop
    echo "App has been initialized. Please run \"./laravel.sh start --with-dev\" to start development server."
    ;;
  start)
    docker compose up --build -d
    if [[ -n ${WITH_DEV} ]]
    then
      ./laravel.sh start-dev
    fi
    ;;
  stop)
    docker compose stop
    ;;
  install-dependencies)
    if [[ -n ${APP_CONTAINER} ]]; then
      docker exec -it "$APP_CONTAINER" composer install
      docker exec -it "$APP_CONTAINER" npm install
    else
      no_container_running
    fi
    ;;
  generate-app-key)
    if [[ -n ${APP_CONTAINER} ]]; then
      docker exec -it "$APP_CONTAINER" php artisan key:generate
    else
      no_container_running
    fi
    ;;
  migrate)
    if [[ -n ${APP_CONTAINER} ]]; then
      docker exec -it "$APP_CONTAINER" php artisan migrate
    else
      no_container_running
    fi
    ;;
  start-dev)
    if [[ -n ${APP_CONTAINER} ]]; then
      docker exec -it "$APP_CONTAINER" npm run dev
    else
      no_container_running
    fi
    ;;
  run-tests)
    if [[ -n ${APP_CONTAINER} ]]; then
      docker exec -it "$APP_CONTAINER" composer run-script full-test-suite
    else
      no_container_running
    fi
    ;;
  *)
    echo "ERROR: Invalid parameter $1." 1>&2
    exit 1 # terminate and indicate error
    ;;
esac
