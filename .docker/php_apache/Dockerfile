FROM syednaeem15191/php:8.3-apache

WORKDIR /var/www/project

COPY apache.conf /etc/apache2/sites-available/000-default.conf

COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf

COPY entrypoint.sh /var/www/entrypoint.sh

RUN echo 'memory_limit = 1G' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

RUN echo 'post_max_size = 64M' >> /usr/local/etc/php/conf.d/docker-php-postmaxsize.ini;

RUN echo 'upload_max_filesize = 16M' >> /usr/local/etc/php/conf.d/docker-php-uploadmaxfilesize.ini;

RUN echo 'max_execution_time = 3600' >> /usr/local/etc/php/conf.d/docker-php-maxexecutiontime.ini;

RUN echo '* * * * * root php /var/www/project/artisan schedule:run >> /var/www/project/storage/logs/scheduler.log 2>&1' >> /etc/crontab

ENTRYPOINT ["sh", "/var/www/entrypoint.sh"]
