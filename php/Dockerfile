FROM php:8.1-fpm
RUN docker-php-ext-install pdo_mysql

COPY mailhog.ini /usr/local/etc/php/conf.d/mailhog.ini

RUN curl -sSL https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 -o mhsendmail \
    && chmod +x mhsendmail \
    && mv mhsendmail /usr/local/bin/mhsendmail