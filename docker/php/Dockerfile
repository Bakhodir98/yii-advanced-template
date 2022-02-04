FROM php:7.4-fpm

WORKDIR /tmp
COPY composer-setup.php .
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php