<?php

return array(
    'appnamespace' => 'Application',
    'phpSettings' => array(
        'display_startup_errors' => 1,
        'display_errors' => 1,
    ),
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
            'username' => 'root',
            'password' => 'mdeed',
            'dbname' => 'platon',
            'charset' =>  'UTF8',
            'profiler' => false,
        ),
    ),
);