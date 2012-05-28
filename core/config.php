<?php

return array(
    'appnamespace' => 'Application',
    'phpSettings' => array(
        'display_startup_errors' => 1,
        'display_errors' => 1,
    ),
    'baseUrl'=>'/',
    'resources' => array(
        'frontController' => array(
            'controllerDirectory' => APPLICATION_PATH . '/controllers',
            'params' => array(
                'displayExceptions' => 1
            )
        )
    ),
    'bootstrap' => array(
        'path' => APPLICATION_PATH . '/Bootstrap.php',
        'class' => 'Bootstrap'
    ),
    'db' => array(
        'adapter' => 'Mysqli',
        'params' => array(
            'host' => 'localhost',
            'username' => 'platon',
            'password' => 'platon',
            'dbname' => 'platon',
            'charset' =>  'utf8',
            'profiler' => false,
            'prefix'=>'plt_'
        ),
    ),
);