make.DEFAULT_GLOBAL := help

init:
	make start
	make composer-install
	make database-create

start:
	docker compose -f docker/docker-compose.yml  up -d

stop:
	docker compose -f docker/docker-compose.yml down

kill:
	docker compose -f docker/docker-compose.yml kill

recreate-force:
	docker compose -f docker/docker-compose.yml up -d --build --force-recreate

recreate:
	docker compose -f docker/docker-compose.yml up -d --build

composer-install:
	docker compose -f docker/docker-compose.yml exec php composer install

composer-require:
	docker compose -f docker/docker-compose.yml exec php composer require

composer-dump-autoload:
	docker compose -f docker/docker-compose.yml exec php composer dump-autoload

run-test:
	docker compose -f docker/docker-compose.yml exec -T php sh -lc "./vendor/bin/phpunit"

run-test-coverage:
	docker compose -f docker/docker-compose.yml exec -T php sh -lc "XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html coverage"

init-test:
#	docker compose -f docker/docker-compose.yml exec php php bin/console doctrine:database:create --env=test
	docker compose -f docker/docker-compose.yml exec php php bin/console doctrine:schema:update --env=test --force

cache-clear:
	docker compose -f docker/docker-compose.yml exec php php bin/console cache:clear

database-create:
	docker compose -f docker/docker-compose.yml exec php php bin/console doctrine:database:create

migration-migrate:
	docker compose -f docker/docker-compose.yml exec php php bin/console doctrine:migration:migrate

migration-diff:
	docker compose -f docker/docker-compose.yml exec php bin/console doctrine:migration:diff