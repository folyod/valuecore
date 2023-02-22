phpunit:
	@vendor/bin/phpunit test

phpcbf:
	@vendor/bin/phpcbf src

phpcs:
	@vendor/bin/phpcs --standard=PSR12 src

phpstan:
	@vendor/bin/phpstan analyse -l 9 src --memory-limit=-1
