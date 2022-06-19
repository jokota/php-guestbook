FROM composer:2.3 AS build-env
COPY ./src /src
RUN cd /src && composer install

FROM php:7.2-apache
ENV PORT 80
EXPOSE 80
RUN docker-php-ext-install pdo_mysql
COPY --from=build-env /src /var/www/html
RUN usermod -u 1000 www-data; \
    a2enmod rewrite; \
    chown -R www-data:www-data /var/www/html


