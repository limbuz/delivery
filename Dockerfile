FROM php:8.1-fpm

WORKDIR /var/www

COPY composer.json /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    zip \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www
RUN chown www /var/www

USER www

RUN composer install

EXPOSE 9000
CMD ["php-fpm"]
