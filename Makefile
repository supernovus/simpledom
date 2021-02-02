.PHONY: test doc clean distclean

test: phpunit
	./phpunit

phpunit:
	wget -O ./phpunit https://phar.phpunit.de/phpunit-nightly.phar
	chmod +x ./phpunit

doc: phpdoc
	./phpdoc

phpdoc:
	wget -O ./phpdoc http://phpdoc.org/phpDocumentor.phar
	chmod +x ./phpdoc

clean:
	rm -rf ./build

cleantools:
	rm -f ./phpunit ./phpdoc 

distclean: clean cleantools
	rm -rf ./doc

