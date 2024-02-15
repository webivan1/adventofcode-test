DOCKER = test-php
PHP_RUN = docker run --rm $(DOCKER) $(1)
PHP_RUN_TTY = docker run -it --rm $(DOCKER) $(1)

build:
	docker build -t $(DOCKER) .

code-style:
	$(call PHP_RUN, composer code-style)

analyse-code:
	$(call PHP_RUN, composer analyse-code)

enter:
	$(call PHP_RUN_TTY, bash)

test:
	$(call PHP_RUN, composer test)

check: code-style analyse-code test

result:
	$(call PHP_RUN, composer start)
