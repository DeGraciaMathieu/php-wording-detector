test:
	vendor/bin/phpunit

cov:
	vendor/bin/phpunit --coverage-text | grep -A 4 "Summary:"