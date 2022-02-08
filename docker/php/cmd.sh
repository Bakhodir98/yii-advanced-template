#!/bin/bash
sleep 10
ping -c 1 host.docker.internal
if [ $? -eq 0 ]; then
  echo "xdebug.client_host=host.docker.internal" > $PHP_INI_DIR/conf.d/custom-002.ini
else
  echo "xdebug.client_host=$(ip route|awk '/default/ { print $3 }')" > $PHP_INI_DIR/conf.d/custom-002.ini
fi
composer install
php init --env=Development --overwrite=No
./yii migrate --interactive=0 --migrationPath=@vendor/filsh/yii2-oauth2-server/src/migrations
./yii migrate --interactive=0 --migrationPath=@yii/rbac/migrations
./yii migrate --interactive=0
find backend/web/assets -maxdepth 1 ! -path backend/web/assets -type d -exec rm -rf {} \;
find frontend/web/assets -maxdepth 1 ! -path frontend/web/assets -type d -exec rm -rf {} \;
set -m
php-fpm &
#supercronic /tmp/my_crontab & ./yii chat/server-run
fg %1