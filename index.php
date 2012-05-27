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

<<<<<<< HEAD

require_once 'core/library/Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();        
        $autoloader->setFallbackAutoloader(true);


// Запуск приложения
$bootstrap = new Bootstrap();
$bootstrap->run($config);
=======
/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/config.php'
);


$application->bootstrap()
            ->run();
>>>>>>> platon/master
