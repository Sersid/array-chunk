install: docker-build composer-install
docker-build:
	docker-compose up -d --build
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down
docker-restart: docker-down docker-up
composer-install:
	docker-compose exec php-fpm-8.3 composer install
bash:
	docker-compose exec php-fpm-8.3 bash
