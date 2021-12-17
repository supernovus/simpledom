# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.0.0] - 2021-12-16
### Added
- Static `loadFile()` method to load XML file.
- Static `fromDOM()` method to get a SimpleDOM from a DOMNode.
- Static `fromSimpleXML()` method to get a SimpleDOM from a SimpleXMLElement.
- Static `load()` method to detect input and call an appropriate loader.
- Static `from()` method is an alias to `load()`.
- Static `useErrors(), lastError(), getErrors(), clearErrors()` methods that wrap various libxml functions with some convenience features included.
- Static `errorRun()` for running a Closure and recording LibXML errors.
- Static `errorCall()` for running a callable and recording LibXML errors.

### Changed
- Dropped PHP 5 support, PHP 7.4 is now the minimum. Use 2.x for PHP 5.
- `loadHTML()` and `loadHTMLFile()` support passing LibXML options now.
- `loadHTML()` and `loadHTMLFile()` will work in sub-classes now.
- Composer Autoloader using `classmap` instead of `files` now.
- Moved `SimpleDOM.php` into `lib` sub-directory.
- PHPUnit is now in the `require-dev` dependencies.
- PHPUnit binary now in `./vendor/bin` directory.
- PHPUnit using `vendor/autoload.php` as bootstrap.
- `insertXML()` and internal `_xpath()` using new error handling methodology.
- Updated all the tests with PHPUnit 9.x support.

### Removed
- Removed downloading the phpunit.phar from the Makefile. Use composer instead.
- Moved the global functions into the `lum/simpledom-functional` package.
- Any tests for the global functions are moved into the new package as well.
- The `&$errors` option from `loadHTML()` and `loadHTMLFile()` is gone now. Instead if you want to get parse errors, just wrap the calls in an `[$res, $err] = errorRun(fn() => SimpleDOM::loadHTML($htmlDoc))` block and presto, results from the command, and an array of errors. This works for _any_ method calls, and I think is a better way of handling LibXML errors.

## [2.1.2]
### Added
- New `clean`, `cleantools`, and `distclean` targets to the `Makefile`.
- Added PHP 8 to list of supported versions in `composer.json`.

### Changed
- Updated tests to work with PHP 8 and a pre-release version of PHPUnit 9.

## [2.1.0] - 2019-09-19
### Added
- Added `simpledom_import_simplexml()` global function.
- Added `rootElement()` instance method to get the top-level document element.
- Added `composer.json` and published package as `lum/simpledom`.

### Changed
- Updated tests to PHPUnit 6 (now with PHP namespaces.)

## [2.0.0] - 2016-12-05
### Changed
- Replaced the `asPrettyXML()` function entirely. The old version uses an inline XSLT stylesheet, whereas the new version simply uses the pretty printing available in libXML and exposed by the `DOMDocument` class.
- Made the `XSLT()` method test for the `xsl` extension.
- Converted tabs to 2 spaces because that's my preference.
- Put `@version` and `@link` tags in the package docblock.

### Fixed
- Wording in README was updated in a few places.

## [2.0.0-RC1] - 2016-12-05
### Added
- Forked the original code from Google Code, and imported into git.
- Added `simpledom_import_dom()` global function.
- Added a `README.md` file.
- Overhauled all the test classes to work with PHPUnit 5.

[Unreleased]: https://github.com/supernovus/simpledom/compare/v3.0.0...HEAD
[3.0.0]: https://github.com/supernovus/simpledom/compare/v2.1.2...v3.0.0
[2.1.2]: https://github.com/supernovus/simpledom/compare/v2.1.0...v2.1.2
[2.1.0]: https://github.com/supernovus/simpledom/compare/v2.0.0...v2.1.0
[2.0.0]: https://github.com/supernovus/simpledom/compare/v2.0.0-RC1...v2.0.0
[2.0.0-RC1]: https://github.com/supernovus/simpledom/releases/tag/v2.0.0-RC1
