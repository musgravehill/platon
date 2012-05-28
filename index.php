<?php
define('ROOT',realpath(dirname(__FILE__)));

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', ROOT . '/core');

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/library'),
    get_include_path(),
)));