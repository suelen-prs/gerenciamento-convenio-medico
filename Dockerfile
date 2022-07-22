#FROM composer:1.10.1 as build
#WORKDIR /app
#COPY . /app
#RUN composer install

#FROM php:7.2.28-apache
#EXPOSE 80
#COPY --from=build /app /app
#COPY vhost.conf /etc/apache2/sites-available/000-default.conf
#RUN chown -R www-data:www-data /app a2enmod rewrite

FROM php:7.2.28-apache
WORKDIR /app
COPY . /app
EXPOSE 80
COPY --from=build /app /app
RUN apk add --no-cache \
        zip \
        libzip-dev \
        libpng \
        libpng-dev \
        libjpeg \
        icu \
        icu-dev \
        libxml2 \
        libxml2-dev \
        openssl \
        openssl-dev \
        oniguruma-dev
RUN docker-php-ext-install \
        pdo_mysql \
        mysqli \
        gd \
        mbstring \
        intl \
        xml \
        opcache \
        zip
RUN curl -sS https://getcomposer.org/installer | php ;mv composer.phar /usr/local/bin/composer \
&& composer config -g repositories.packagist composer https://packagist.jp/ \
&& composer global require hirak/prestissimo \
&& composer global require phpunit/phpunit
