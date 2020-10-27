FROM debian:buster

# Comment

# RUN echo 'Running script... hope you're going to fly...'

# --- Prerequisites

RUN apt-get update
RUN apt-get -y upgrade
RUN apt-get install -y bash
RUN apt-get install -y curl

# --- NGINX Install NGINX and setup basic configuration

RUN apt-get install -y nginx
WORKDIR /etc/nginx/sites-available/
COPY ./srcs/nginx_ai_on.conf .
COPY ./srcs/nginx_ai_off.conf .
RUN ln -s /etc/nginx/sites-available/nginx_ai_on.conf /etc/nginx/sites-enabled/
WORKDIR /
COPY ./srcs/nginx_ai_on.conf .
COPY ./srcs/nginx_ai_off.conf .
COPY ./srcs/ai_off.sh .
COPY ./srcs/ai_on.sh .

# --- MYSQL Install  MYSQL, create database/user and set password ---

RUN apt-get install -y mariadb-server
WORKDIR /
COPY ./srcs/create_test_db.sql .
RUN service mysql start && mysql < create_test_db.sql

# --- PHP Install php and all neccesary modules
RUN apt-get install -y php
RUN apt-get install -y php7.3-fpm php-mysql
RUN apt-get install -y php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip

# --- WORDPRESS Install wordpress and setup basic configuration---
WORKDIR /var/www/ft_server
RUN /usr/bin/curl -LO https://wordpress.org/latest.tar.gz
RUN tar xzf latest.tar.gz
RUN rm -rf latest.tar.gz
RUN chown -R www-data:www-data /var/www/ft_server/wordpress
WORKDIR /var/www/ft_server/wordpress
COPY ./srcs/wp-config.php .

# --- SSL ---
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/nginx-selfsigned.key \
    -out /etc/ssl/certs/nginx-selfsigned.crt \
    -subj "/C=RU/ST=Moscow/L=Moscow/O=tkiwiber/OU=school21/CN=localhost"

# --- PHPMYADMIN ---
WORKDIR /var/www/ft_server
RUN /usr/bin/curl -LO https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-english.tar.gz
RUN tar xzf phpMyAdmin-5.0.2-english.tar.gz
RUN mkdir phpmyadmin
RUN mv phpMyAdmin-5.0.2-english/* phpmyadmin/
RUN rm -rf phpMyAdmin-5.0.2-english phpMyAdmin-5.0.2-english.tar.gz
COPY ./srcs/config.inc.php ./phpmyadmin/

EXPOSE 80 443

WORKDIR /
COPY ./srcs/restart.sh .
COPY ./srcs/start.sh .

CMD bash ./start.sh

# Comment at the end

RUN echo 'Done!'
