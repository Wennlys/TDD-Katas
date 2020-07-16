# To check if Makefile has correct syntax (all must be tabs (^I), no spaces)
# cat -e -t -v Makefile
.PHONY: tests
tests:
	./vendor/bin/phpunit

.PHONY: docker-tests
docker-tests:
	docker run -v $(shell pwd):/home/codium php:7.1 bash -c "cd /home/codium && make tests"

.PHONY: docker-composer
docker-composer:
	docker run -v $(shell pwd):/home/codium -u=$(shell id -u):$(shell id -g) composer bash -c "cd /home/codium && composer install"
