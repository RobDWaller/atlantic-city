<?php
/**
 * @package Atlantic City
 * @version 0.1.0
 */
/*
Plugin Name: Atlantic City
Plugin URI: https://github.com/RobDWaller/atlantic-city
Description: A Composer based WordPress plugin which displays lyrics from the song Atlantic City in the WordPress admin.
Author: Rob Waller
Version: 0.1.0
Author URI: http://rbrt.wllr.info
*/
$vendor = 'vendor/autoload.php';

if (file_exists($vendor)) {
    require $vendor;
}

$atlantic = new App\AtlanticCity;
$atlantic->run();
