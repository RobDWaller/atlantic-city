<?php
/**
 * @package Atlantic City
 * @version 0.1.0
 *
 * @wordpress-plugin
 * Plugin Name: Atlantic City
 * Plugin URI: https://github.com/RobDWaller/atlantic-city
 * Description: A Composer based WordPress plugin which displays lyrics from the song Atlantic City in the WordPress admin.
 * Author: Rob Waller
 * Version: 0.1.0
 * Author URI: http://rbrt.wllr.info
 */

$composerAutoloader = __DIR__ . '/vendor/autoload.php';

if (is_file($composerAutoloader)) {
    require $composerAutoloader;
}

(new App\AtlanticCity)->run();
