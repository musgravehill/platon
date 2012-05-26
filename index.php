<?php
// Подключаем файл настроек
require '/core/settings/config.php';

// Создаем строку путей
$paths = implode(PATH_SEPARATOR, 
    array(
        $config['path']['library'], 
        $config['path']['models'],
        $config['path']['controllers'],
    ));

// Устанавливаем пути по которым происходит поиск подключаемых файлов, это папка библиотек, моделей и системных файлов
set_include_path($paths);

// Подключение главного системного класса
require '/core/Bootstrap.php';

// Запуск приложения
$bootstrap = new Bootstrap();
$bootstrap->run($config);