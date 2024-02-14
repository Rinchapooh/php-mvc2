
FROM php:8.3-fpm

RUN  pecl install xdebug

RUN apt update -y && apt install iputils-ping -y
RUN docker-php-ext-install pdo pdo_mysql


#RUN ln -sf /proc/self/fd/2 /var/log/xdebug.log \
#    && ln -sf /proc/self/fd/2 /var/log/xdebug.log
#


