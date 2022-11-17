FROM php:8.0-apache
RUN apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql && \
    a2enmod authn_dbd && \
    docker-php-ext-install mysqli && \
    pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis