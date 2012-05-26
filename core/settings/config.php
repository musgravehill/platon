<?php


// Физический путь к корню сайта
$root=dirname(__FILE__);
$root .= '/../../';

// Физический путь к document_root
$rootPublic = $root . ''; //.'public'

// Базовый URL.
// Если вы хотите положить сайт в отдельную папку а не в корень виртуального хоста, этот параметр необходимо  изменить на /dir_name/
$baseUrl = '/';

// Масив настроек
$config = array (
    // Настройки соединения с БД
    'db'    => array (
        // Адаптер    
        'adapter'   => 'PDO_MYSQL',        
        
        // Параметры
        'params'    => array( 
            // Сервер БД
            'host'          => 'localhost',
            // Имя пользователя 
            'username'      => 'root',
            // Пароль пользователя
            'password'      => 'mdeed',
            // Имя базы
            'dbname'        => 'platon',
            // Опции драйвера
            'driver_options'=> array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'),
            // Профайлер БД
            'profiler'      => false,
            //постоянное соединение с бд
            //'persistent'    => true,
        ),
    ),
    // Настройки URL адресов
    'url'   => array (
         // Базовый URL
         'base'         => $baseUrl,
         // Адрес папки где собраны открытые для доступа из вне файлы
         'public'       => $baseUrl . 'public',
         // Адрес папки где лежат графические изображения для дизайна
         'img'          => $baseUrl . 'img',
         // Адрес папки где лежат css файлы
         'css'          => $baseUrl . 'css',
     ),
    // Физические пути
    'path'  => array (
        // Физический путь к корню сайта
        'root'         => $root,
        // Document root
        'rootPublic'   => $rootPublic,
        // Путь к приложениям
        'core'  => $root . '/core/',
        // Путь к библиотекам
        'library'      => $root . '/core/library/',
        // Путь к моделям
        'models'       => $root . '/core/models/',
        
        // Путь к контроллерам
        'controllers'  => $root . '/core/controllers/',
        // Путь к видам
        'views'        => $root . '/core/views/',
        // Путь к layouts
        'layouts'      => $root . '/core/views/layouts/',
        // Путь к конфигурационным файлам
        'settings'     => $root . '/core/settings/',
        
     ),
    // Общие настройки
    'common' => array (
         // Кодировка сайта
         'charset'      => 'utf-8',
     ),
     // Настройки дебага
    'debug' => array (
         // Статус дебага, включен или нет
         'on'           => false,
     ),   
    
    'resources' => array (
         // задали ЛОКАЛЬ для переводчика. bootstrap.php -- _initTranslator() - там эта локаль используется
         //для сканирования директорий ru\de\fr\ua\bg\en и т.д.
         'translate'   => array ('locale'=>'auto',),
     ), 
    
);

// Настройки локали
date_default_timezone_set("Etc/GMT-4");

