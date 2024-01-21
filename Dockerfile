FROM php:8.1-fpm-alpine

RUN set -ex \
    && apk --no-cache add mysql-dev nodejs npm icu-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql intl zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
