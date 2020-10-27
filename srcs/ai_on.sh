#!/bin/sh
# copy configuration file with autoindex ON option
rm /etc/nginx/sites-enabled/*
ln -s /etc/nginx/sites-available/nginx_ai_on.conf /etc/nginx/sites-enabled/
# restart nginx web server to activate changes
nginx -s reload
