FROM composer:1.10.1 as build
WORKDIR /app
COPY . /app
RUN composer install

FROM php:7.2.28-apache
EXPOSE 80
COPY --from=build /app /app
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /app a2enmod rewrite