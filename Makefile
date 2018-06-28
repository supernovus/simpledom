.PHONY: test doc

test: phpunit
	./phpunit

phpunit:
	wget -O ./bin/phpunit https://phar.phpunit.de/phpunit-6.phar
	chmod +x ./bin/phpunit

doc: phpdoc
	./phpdoc

phpdoc:
	wget -O ./bin/phpdoc http://phpdoc.org/phpDocumentor.phar
	chmod +x ./bin/phpdoc

