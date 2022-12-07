FROM composer:latest AS composer
FROM php:8.0-apache

WORKDIR /var/www/html/
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1


COPY app/composer.json ./

RUN docker-php-ext-install mysqli
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
RUN a2enmod rewrite && a2enmod authn_dbd && apt-get update && apt-get install -y apache2-utils libaprutil1-dbd-mysql && \
    apt-get install -y git && \
    apt-get install -y libpng-dev && \
    apt-get install -y zip unzip && \
    docker-php-ext-install gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN composer update && \
    composer install 