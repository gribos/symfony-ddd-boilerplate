.PHONY: up down build install test cs-fix cs-check phpstan deptrac deptrac-graph ci shell db-migrate db-diff cache-clear

COMPOSE = docker compose
PHP = $(COMPOSE) exec php

up:
	$(COMPOSE) up -d

down:
	$(COMPOSE) down

build:
	$(COMPOSE) build --no-cache

install:
	$(PHP) composer install

update:
	$(PHP) composer update

test:
	$(PHP) bin/phpunit

test-coverage:
	$(PHP) -d xdebug.mode=coverage bin/phpunit --coverage-html var/coverage/html

cs-check:
	$(PHP) vendor/bin/php-cs-fixer fix --dry-run --diff --config=.php-cs-fixer.dist.php

cs-fix:
	$(PHP) vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php

phpstan:
	$(PHP) vendor/bin/phpstan analyse --configuration=phpstan.neon

phpstan-baseline:
	$(PHP) vendor/bin/phpstan analyse --configuration=phpstan.neon --generate-baseline=phpstan-baseline.neon

deptrac:
	$(PHP) vendor/bin/deptrac analyse --config-file=deptrac.yaml

deptrac-graph:
	$(PHP) vendor/bin/deptrac analyse --config-file=deptrac.yaml --formatter=graphviz-image --output=var/deptrac-graph.png

ci: cs-check phpstan deptrac test

shell:
	$(PHP) sh

db-migrate:
	$(PHP) bin/console doctrine:migrations:migrate --no-interaction

db-diff:
	$(PHP) bin/console doctrine:migrations:diff

db-drop:
	$(PHP) bin/console doctrine:database:drop --force --if-exists

db-create:
	$(PHP) bin/console doctrine:database:create --if-not-exists

db-reset: db-drop db-create db-migrate

cache-clear:
	$(PHP) bin/console cache:clear

sf:
	$(PHP) bin/console $(cmd)
