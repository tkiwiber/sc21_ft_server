#!/bin/sh
# restart all services:nginx web server, php-fpm, mysql
service nginx restart
service mysql restart
service php7.3-fpm restart
bash
#tail -f /dev/null
