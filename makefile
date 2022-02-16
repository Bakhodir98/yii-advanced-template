CURRENT_UID := $(shell id -u)
env-up:
	docker-compose up --build
	sudo chown -R $(CURRENT_UID):$(CURRENT_UID) *
env-start:
	docker-compose start
env-stop:
	docker-compose stop
env-down:
	docker-compose down
php-attach:
	docker exec -it tmp_php bash
php-logs:
	docker-compose logs -f php
migrate-up:
	docker-compose exec php ./yii migrate --interactive=0
migrate-down:
	docker-compose exec php ./yii migrate/down --interactive=0