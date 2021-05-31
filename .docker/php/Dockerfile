FROM php:8.0-fpm

RUN apt-get update
RUN apt-get install curl libxml2-dev libsqlite3-0 libsqlite3-dev \
    libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev \
    libjpeg-dev libfreetype6-dev \
    -y
RUN apt-get autoremove -y
RUN pecl install xdebug

RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install mysqli pdo pdo_mysql xml gd intl

RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini


RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint

RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint

RUN echo '\
opcache.interned_strings_buffer=16\n\
opcache.load_comments=Off\n\
opcache.max_accelerated_files=16000\n\
opcache.save_comments=On\n\
opcache.enable_cli=1\n\
opcache.jit_buffer_size=500000000\n\
opcache.jit=1235\n\
' >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN echo "xdebug.mode=develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=false" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=wsl2.host" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
