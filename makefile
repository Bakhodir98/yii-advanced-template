<<<<<<< HEAD
CURRENT_UID := $(shell id -u)
env-up:
	docker-compose up --build
	sudo chown -R $(CURRENT_UID):$(CURRENT_UID) *
=======
env-up:
	sudo chown -R $USER:www-data *
	docker-compose up -d --build
>>>>>>> a9a36338bfcc61d1778d85646bbc7ed760c15f44
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