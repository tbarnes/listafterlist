<?php if (!defined('ACCESS')) die('No direct script access allowed!');

DB::connect(array(
  'host' => 'localhost',
  'username' => 'root',
  'password' => 'root',
  'database' => 'lal'
));

/**
 * Set the default timezone of your location.
 */
date_default_timezone_set('Europe/London');

/**
 * Set the format you would like displayed to the users.
 *
 * For more information on this visit:
 * http://php.net/manual/en/function.date.php
 *
 * Current one looks like: May 19th, 2016 12:43pm
 */
define('TIME_FORMAT', 'dS M, Y');

/**
 * The default database time format.
 */
define('DATABASE_DATETIME_FORMAT', 'Y-m-d H:i:s');

/**
 * To put the system into demo mode and limited usage
 * then change this value to true.
 */
define('DEMO_MODE', false);
