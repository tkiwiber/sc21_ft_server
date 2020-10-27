#!/bin/sh
# copy configuration file with autoindex OFF option
rm /etc/nginx/sites-enabled/*
ln -s /etc/nginx/sites-available/nginx_ai_off.conf /etc/nginx/sites-enabled/
# restart nginx web server to activate changes
nginx -s reload 
