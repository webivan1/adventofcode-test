DOCKER = test-php
PHP_RUN = docker run -it --rm $(DOCKER) $(1)
PHP_UNIT = $(call PHP_RUN, vendor/bin/phpunit $(1))

build:
	docker build -t $(DOCKER) .

code-style:
	$(call PHP_RUN, vendor/bin/phpcs --ignore=*/vendor/* --standard=PSR12 /app)

analyse-code:
	$(call PHP_RUN, vendor/bin/phpstan analyse src tests)

enter:
	$(call PHP_RUN, bash)

test:
	$(call PHP_UNIT, --testdox tests)