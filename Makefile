PHING_BIN = ./vendor/bin/phing
PHING_IS_INSTALLED=$(shell [ -e $(PHING_BIN) ] && echo 1 || echo 0 )
PHP_CS_FIXER=./vendor/bin/php-cs-fixer

.PHONY: install

install:
ifeq ($(PHING_IS_INSTALLED), 0)
	composer install
endif
	$(PHING_BIN) install

build: install
	$(PHING_BIN) prepare

docker-in:
	cd ../dev-manager && docker-compose exec mock_api /bin/bash

start:
	php bin/console server:run

stop:
	php bin/console server:stop

test:
	$(PHING_BIN) test

analysis:
	$(PHING_BIN) analysis

static-analysis:
	$(PHING_BIN) static-analysis

docker-in:
	cd ../dev-manager && docker-compose exec mock_api /bin/bash

fix:
	$(PHP_CS_FIXER) fix ./src
