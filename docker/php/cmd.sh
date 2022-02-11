#!/bin/bash

composer install
sudo -H -u "$USER" bash -c 'php init --env=Development --overwrite=No'
sudo -H -u "$USER" bash -c 'php yii migrate --interactive=0 --migrationPath=@vendor/filsh/yii2-oauth2-server/src/migrations'
sudo -H -u "$USER" bash -c 'php yii migrate --interactive=0 --migrationPath=@yii/rbac/migrations'
sudo -H -u "$USER" bash -c 'php yii migrate --interactive=0'

fg %1