# SimpleDOM

## Summary

A bridge between SimpleXML and the DOM extension, plus a bunch of convenience methods.

## Description

SimpleDOM is built upon SimpleXML and acts as a bridge providing DOM methods using SimpleXML's syntax. It also adds a bunch of convenience methods.

SimpleDOM is a single file with no dependencies. All you need to use it, is include it and create `SimleDOM` objects instead of `SimpleXMLElement` objects, or simply use `simpledom_load_string()` or `simpledom_load_string()`.

## Credits

This library is cloned from https://code.google.com/archive/p/simpledom/ where it appears to have been worked on until 2010.

I have updated the tests to work with the newest versions of PHPUnit, which are bundled as a PHAR archive and don't use the `require_once` calls anymore.

I also added a `simpledom_import_dom()` method requested in the issue tracker on the original project.

I may add new features and ensure it works with the newest versions of PHP as I maintain this copy on Github.

## License

[MIT License](http://www.opensource.org/licenses/mit-license.php)

