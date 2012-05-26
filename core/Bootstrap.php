<?php
require_once 'core/library/Zend/Loader/Autoloader.php';

class Bootstrap
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

            // Настройка front контроллера, указание базового URL, правил маршрутизации 
            $front->setBaseUrl($this->_config->url->base)
                  ->throwexceptions(false) //////!!!! true теперь плагин на преДиспатч всегда ловит ошибки
                  ->setRouter($router);
                  
            $front->setParam('disableOutputBuffering', true);            
                 
                        
            $front = Zend_Controller_Front::getInstance();
            
           ///register plugins
           // include("..\application\plugins\Cachepage.php");            
            ///$front->registerPlugin(new Cachepage());
           
            //$front->dispatch();  диспетч вызовется сам после           

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
        $autoloader = Zend_Loader_Autoloader::getInstance();        
        $autoloader->setFallbackAutoloader(true);       
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

        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    }
    
    
    
    
        
            
    /**
     * Установка соединения с базой данных и помещение его объекта в реестр.
     */
    public function setDbAdapter() 
    {
        // Подключение к БД, так как Zend_Db "понимает" Zend_Config, нам достаточно передать специально сформированный объект конфигурации в метод factory
        $db = Zend_Db::factory($this->_config->db);        
        // Изменяем режим извлечения данных, FETCH_OBJ - данные в виде массива объектов
        // По умолчанию стоит режим FETCH_ASSOC - массив ассоциативных массивов.
        $db->setFetchMode(Zend_Db::FETCH_OBJ);             
        // Задание адаптера по умолчанию для наследников класса Zend_Db_Table_Abstract 
        Zend_Db_Table_Abstract::setDefaultAdapter($db);          
        // Занесение объекта соединения c БД в реестр
        Zend_Registry::set('db', $db);        
        
    }

    /**
     * Настройка маршрутов
     */
    public function setRouter() 
    {
        // Подключение файла правил маршрутизации
        require($this->_config->path->settings . 'routes.php');

        // Если переменная router не является объектом Zend_Controller_Router_Abstract, выбрасываем исключение
        if (!($router instanceof Zend_Controller_Router_Abstract)) {
            throw new Exception('Incorrect config file: routes');
        }
        
        return $router;
    }                                                       
     

}

