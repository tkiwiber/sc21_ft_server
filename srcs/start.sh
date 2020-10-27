#!/bin/sh
# restart all services:nginx web server, php-fpm, mysql
service nginx start
service php7.3-fpm start
service mysql start
bash
# tail -f /dev/null
