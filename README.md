# Atlantic City

[![Build Status](https://travis-ci.org/RobDWaller/atlantic-city.svg?branch=master)](https://travis-ci.org/RobDWaller/atlantic-city) [![codecov](https://codecov.io/gh/RobDWaller/atlantic-city/branch/master/graph/badge.svg)](https://codecov.io/gh/RobDWaller/atlantic-city)

A Composer based WordPress plugin which displays lyrics from the song Atlantic City in the WordPress admin.

This plugin was developed to show how to create WordPress plugins which are hosted on [Packagist](https://packagist.org/) and work with Composer friendly WordPress frameworks like [Dusty](https://packagist.org/packages/rbdwllr/dusty).

It also highlights how to write unit tests for WordPress plugins using [WP_Mock](https://packagist.org/packages/10up/wp_mock) and how to integrate with code analysis tools like [PHPStan](https://packagist.org/packages/phpstan/phpstan).

## Composer Setup

There is only one thing different about a WordPress plugin built with Composer compared to standard PHP packages, which is the package type. With WordPress plugins you set the type to wordpress-plugin in the [Composer.json file](https://github.com/RobDWaller/atlantic-city/blob/master/composer.json).

```javascript
"type": "wordpress-plugin",
```

This simply tells Composer friendly WordPress frameworks how to handle the package, instead of putting the package in the vendor folder it will put the package in the WordPress plugins directory. See [WPackagist](https://wpackagist.org/) for more details on this.

## Unit Tests with WP_Mock

To write unit tests for WordPress you need to use a package called [WP_Mock](https://packagist.org/packages/10up/wp_mock). It is an extension of PHP Unit which allows you to mock WordPress' custom function calls.

For instance this library's [unit tests](https://github.com/RobDWaller/atlantic-city/blob/master/tests/AtlanticCityTest.php) mock the `is_rtl()` function which tells WordPress if the site's text runs from right to left or left to right.

```php
WP_Mock::userFunction('is_rtl', [
    'times' => 1,
    'return' => false
]);
```

To use WP_Mock you need to create a custom [bootstrap file](https://github.com/RobDWaller/atlantic-city/blob/master/tests/bootstrap.php) and extend the WP_Mock test case class rather than the PHP Unit one.

```php
namespace Tests;

use App\MyWordPressCode;
use WP_Mock\Tools\TestCase;
use WP_Mock;

class MyWordPressTests extends TestCase
{
    ...
}
```

WP_Mock also comes with some nice features which allow you to check whether WordPress actions or filters have been called.

```php
WP_Mock::expectActionAdded('action', 'parameters');
```

## Other Code Analysis Tools

This plugin also integrates with a number of other code analysis tools, including [PHP Code Sniffer](https://packagist.org/packages/squizlabs/php_codesniffer) and [PHP Mess Detection](https://packagist.org/packages/phpmd/phpmd). This will help you improve the quality of the code you produce for WordPress plugins.

It also shows how you can integrate with [PHP Stan](https://packagist.org/packages/phpstan/phpstan) so your code can be statically analysed. This requires a small amount of customisation due to custom WordPress functions. So there is a (phpstan config)[https://github.com/RobDWaller/atlantic-city/blob/master/phpstan.neon] setup to ignore function not found errors.
