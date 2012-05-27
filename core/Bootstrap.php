<?php

<<<<<<< HEAD
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   private $_config = null;    
    
   public function run($config) 
   {
        try {          
             
            // Настройка загрузчика
            $this->setLoader();
            //Zend_Session  стартуем сессию с уник.идентификатором
            Zend_Session::start(array('name'=>'PLTN'));
            // Настройка конфигурации
            $this->setConfig($config);
            // Настройка Вида
            $this->setView();            
            // Подключение к базе данных
            $this->setDbAdapter();
            // Подключение маршрутизации
            $router = $this->setRouter();          
            
            // Создание объекта front контроллера 
            $front = Zend_Controller_Front::getInstance();
=======
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
>>>>>>> platon/master


<<<<<<< HEAD
            // Запуск приложения, в качестве параметра передаем путь к папке с контроллерами
            Zend_Controller_Front::run($this->_config->path->controllers);
           
        } 
        catch (Exception $e) {           
            echo $e->getMessage();
            throw $e;                    
        }
    }  
    
        
    /**
     * Настройка загрузчика
     */
    public function setLoader() 
    {        
       // $autoloader = Zend_Loader_Autoloader::getInstance();        
        //$autoloader->setFallbackAutoloader(true);       
    }

    /**
     * Настройка конфигурации
     * 
     * @param array $config Настройки
     */
    public function setConfig($config)
    {
        $config = new Zend_Config($config);
        $this->_config = $config;         
        Zend_Registry::set('config', $config);
    } 
    
    /**
     * Настройка вида
     */    
    public function setView() 
    {
        // Инициализация Zend_Layout, настройка пути к макетам, а также имени главного макета.
        // Параметр layout указан лишь для примера, по умолчанию имя макета именно "layout"
        Zend_Layout::startMvc(array(
            'layoutPath' => $this->_config->path->layouts,
            'layout' => 'layout',
        ));
        // Получение объекта Zend_Layout
        $layout = Zend_Layout::getMvcInstance();
        // Инициализация объекта Zend_View
        $view = $layout->getView();        
        // Настройка расширения макетов
        $layout->setViewSuffix('phtml');
        // Задание базового URL
        $view->baseUrl = $this->_config->url->base;
        // Задание пути для view части
        $view->setBasePath($this->_config->path->views);
        // Установка объекта Zend_View
        $layout->setView($view);        
        // Настройка расширения view скриптов с помощью Action помошников
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer
            ->setView($view)
            ->setViewSuffix('phtml');     
=======
>>>>>>> platon/master

    private function _initDB() {
        $config = $this->getOption('db');
        $db = Zend_Db::factory($config['adapter'], $config['params']);
        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        Zend_Registry::set('db', $db);
    }

    public function run() {
        $this->_initDB();
        $front = Zend_Controller_Front::getInstance();
        $front->dispatch();
    }

}
