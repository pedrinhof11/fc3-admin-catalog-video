FROM php:8.3-fpm
LABEL author="Pedro Felipe"

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip


RUN usermod -u 1000 www-data


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install -o -f redis \
	&& pecl install xdebug-3.3.2 \
    && rm -rf /tmp/pear \
	&& docker-php-ext-enable redis xdebug

COPY ./docker/php/xdebug.ini "${PHP_INI_DIR}/conf.d"

USER www-data

WORKDIR /var/www

EXPOSE 9000
