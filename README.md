# SimpleDOM

## Summary

A bridge between SimpleXML and the DOM extension, plus a bunch of convenience methods.

## Description

SimpleDOM is built upon SimpleXML and acts as a bridge providing DOM methods using SimpleXML's syntax. It also adds a bunch of convenience methods.

## Functional interface

The older versions of this library exported some functions into the global
PHP namespace. These are no longer included in the base package.

If you have legacy code requiring the global functions, you can install [simpledom-functional](https://github.com/supernovus/simpledom-functional) from composer and it will add them. I do recommend moving away from the global functions and using the newer static class methods instead.

## Documentation

Run `make doc` to download phpDocumentor and build the docs.
The makefile is set up to use `wget` so if you require a different download
tool, you'll need to download the file manually and name it `./phpdoc`.

## Tests

Run `make test` to run the tests with PHPUnit, which is installed via composer.

## Credits

This library was originally cloned from https://code.google.com/archive/p/simpledom/ where it appears to have been worked on until 2010.

I've been slowly updating it ever since forking it in 2016.

## License

[MIT License](http://www.opensource.org/licenses/mit-license.php)

