FROM ubuntu:latest

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt update && apt upgrade -y
RUN apt install -y php7.4 \
    php7.4-fpm \
    php7.4-mysqli \
    php7.4-opcache \
    php7.4-gd \
    php7.4-mysqli \
    php7.4-curl \
    php7.4-phar \
    php7.4-json \
    php7.4-mbstring \
    php7.4-pdo \
    php7.4-dom \
    php7.4-xml \
    nano \
    vim

FROM composer:latest

WORKDIR /var/www/ingressoteca
COPY . .

RUN composer install

EXPOSE 8000

CMD [ "php", "artisan", "serve", "--host", "0.0.0.0" ]
