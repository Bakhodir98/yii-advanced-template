FROM php:7.4-fpm
RUN apt-get update
RUN apt-get install -y apt-utils unzip libzip-dev libpng-dev libfreetype6-dev
WORKDIR /tmp
COPY composer-setup.php .
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php
RUN docker-php-ext-configure gd --with-freetype
RUN docker-php-ext-install zip pdo_mysql gd
COPY cmd.sh .
RUN chmod u+x cmd.sh

WORKDIR /var/www/html
CMD ["bash","/tmp/cmd.sh"]
