# Laravel application

## Description
This project is based on [Laravel 11.x](https://laravel.com/docs/11.x/releases) and is fully configured to use [Docker Desktop](https://www.docker.com/products/docker-desktop/).

## Getting started

### Prerequisites
To run this project locally, Docker needs to be installed.
- To install Docker on ubuntu.
  - install docker by following the instructions [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-22-04).
  - install docker compose by following the instructions [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-22-04).
- Or you could install [Docker Desktop](https://www.docker.com/products/docker-desktop/).
- Run below commands to copy the contents of `.env.example` into a new file called `.env` using the command below
```shell
cp .env.example .env
cp project/.env.example project/.env
```
## Installing

- Initialize the project by running the below command.
```shell
./laravel.sh init
```
- Run below commands to start containers with dev server.
```shell
./laravel.sh start --with-dev
```
- Run below commands to stop dev server.
```shell
./laravel.sh stop
```
## Other commands
- Run below commands to install all the dependencies.
```shell
./laravel.sh install-dependencies
```
- Run below commands to dev server.
```shell
./laravel.sh start-dev
```
- Run below commands to generate a new APP_KEY.
```shell
./laravel.sh generate-app-key
```
- Run below commands to run database migrations.
```shell
./laravel.sh migrate
```
- Run below commands to run full test suite.
```shell
./laravel.sh run-tests
```
