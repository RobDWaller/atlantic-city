<?php
/**
 * @package Atlantic City
 * @version 0.1.0-alpha
 */
/*
Plugin Name: Atlantic City
Plugin URI: https://github.com/RobDWaller/atlantic-city
Description: A Composer based WordPress plugin which displays lyrics from the song Atlantic City in the WordPress admin.
Author: Rob Waller
Version: 0.1.0-alpha
Author URI: http://rbrt.wllr.info
*/

require 'vendor/autoload.php';

$atlantic = new App\AtlanticCity;
$atlantic->run();
