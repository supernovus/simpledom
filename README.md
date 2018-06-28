# SimpleDOM

## Summary

A bridge between SimpleXML and the DOM extension, plus a bunch of convenience methods.

## Description

SimpleDOM is built upon SimpleXML and acts as a bridge providing DOM methods using SimpleXML's syntax. It also adds a bunch of convenience methods.

SimpleDOM is a single file with no dependencies. All you need to use it, is include it and create `SimleDOM` objects instead of `SimpleXMLElement` objects, or simply use `simpledom_load_string()` or `simpledom_load_string()`.

## Documentation

If you have 'make' and 'wget' installed, just type 'make doc' and it'll do the rest.

If you don't have 'make', you'll need to download PHPDocumentor (I recommend the PHAR version, 2.9.0 if using PHP 7+), and simple run it while in the directory with the SimpleDOM.php and phpdoc.dist.xml file.

## Tests

If you have 'make' and 'wget' installed, just type 'make test' and it'll do the rest.

If you don't have 'make', you'll need to download PHPUnit (once again, I recommend the PHAR version, I tested with 6.5.8), and simply run it while in the directory with the phpunit.xml file.

## Credits

This library was originally cloned from https://code.google.com/archive/p/simpledom/ where it appears to have been worked on until 2010.

I have updated the library and the tests to work in 2018, and have added and changed a few features.

## License

[MIT License](http://www.opensource.org/licenses/mit-license.php)

