.PHONY: test clean cleantools cleandoc distclean rebuild-doc

vendor:
	composer install

test: vendor
	./vendor/bin/phpunit

phpdoc:
	wget -O ./phpdoc https://phpdoc.org/phpDocumentor.phar
	chmod +x phpdoc

doc: phpdoc
	./phpdoc

rebuild-doc: cleandoc doc

clean:
	rm -rf ./build

cleantools:
	rm -fv ./phpdoc

cleandoc:
	rm -rf ./doc

distclean: clean cleantools cleandoc

