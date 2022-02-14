#!/bin/bash
sleep 10
composer install
php init --env=Development --overwrite=No
php yii migrate --interactive=0
php yii migrate --interactive=0 --migrationPath=@yii/rbac/migrations
php yii migrate --interactive=0 --migrationPath=@vendor/filsh/yii2-oauth2-server/src/migrations

set -m
php-fpm &
fg %1