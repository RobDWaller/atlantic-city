# Atlantic City

[![Actions Status](https://github.com/robdwaller/atlantic-city/workflows/ci/badge.svg)](https://github.com/robdwaller/atlantic-city/actions) [![codecov](https://codecov.io/gh/RobDWaller/atlantic-city/branch/master/graph/badge.svg)](https://codecov.io/gh/RobDWaller/atlantic-city) ![PHP Version Support](https://img.shields.io/packagist/php-v/rbdwllr/atlantic-city)

A Composer based WordPress plugin which displays lyrics from the song [Atlantic City](https://en.wikipedia.org/wiki/Atlantic_City_(song)) in the WordPress admin.

This plugin was created to show developers how to create WordPress plugins which are hosted on [Packagist](https://packagist.org/) and work with Composer friendly WordPress frameworks like [Dusty](https://packagist.org/packages/rbdwllr/dusty).

It also highlights how to write unit tests for WordPress plugins using [WP_Mock](https://packagist.org/packages/10up/wp_mock) and how to integrate with static analysis tools like [PHPStan](https://packagist.org/packages/phpstan/phpstan).

## Composer Setup

There is only one difference between a WordPress plugin built with Composer compared to a standard PHP package, which is the package type. With WordPress plugins you set the type to `wordpress-plugin` in the [Composer.json file](https://github.com/RobDWaller/atlantic-city/blob/master/composer.json).

```json
"type": "wordpress-plugin",
```

This simply tells Composer friendly WordPress frameworks how to handle the package, instead of putting the package in the vendor folder it will put the package in the WordPress plugins directory. See [WPackagist](https://wpackagist.org/) for more details on this.

## Unit Tests with WP_Mock

To write unit tests for WordPress you need to use a package called [WP_Mock](https://packagist.org/packages/10up/wp_mock). It is an extension of PHP Unit which allows you to mock WordPress custom function calls.

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

This plugin integrates with a number of static analysis tools, including [PHP Code Sniffer](https://packagist.org/packages/squizlabs/php_codesniffer) and [PHP Mess Detection](https://packagist.org/packages/phpmd/phpmd), which will help improve the code quality of the WordPress plugins you produce.

It also shows you how to integrate with [PHPStan](https://phpstan.org) to add some type safety to your code. This requires a small amount of customisation to handle WordPress so there is a [configuration file](/phpstan.neon.dist) and an integration with the [szepeviktor/phpstan-wordpress](https://packagist.org/packages/szepeviktor/phpstan-wordpress) package which extends PHPStan for WordPress.
