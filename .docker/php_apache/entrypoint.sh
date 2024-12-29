#!/bin/bash
# find /var/www/project/storage -type d -exec chown www-data {} +
supervisord
service cron start
# /var/www/project/relay run &
docker-php-entrypoint apache2-foreground