env-up:
	sudo chown -R $USER:www-data *
	docker-compose up -d --build
env-start:
	docker-compose start
env-stop:
	docker-compose stop
env-down:
	docker-compose down
php-attach:
	docker-compose exec tmp_php bash
php-logs:
	docker-compose logs -f php
migrate-up:
	docker-compose exec php ./yii migrate --interactive=0
migrate-down:
	docker-compose exec php ./yii migrate/down --interactive=0