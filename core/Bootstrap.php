<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    private function _initDB() {
        $config = $this->getOption('db');
        try {
            $db = Zend_Db::factory($config['adapter'], $config['params']);
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            //$db->getConnection();
            //var_dump($db);
            Platon_Db_Table_Abstract::setDefaultAdapter($db);
            Zend_Registry::set('db', $db);
            if (APPLICATION_ENV == 'development') {
                $profiler = new Zend_Db_Profiler_Firebug('All DB Queries');
                $profiler->setEnabled(true);
                $db->setProfiler($profiler);
            }
        } catch (Zend_Db_Adapter_Exception $e) {
            die('database die');
        }
    }

    public function run() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Platon');
        $this->_initDB();
        $front = Zend_Controller_Front::getInstance();

        $front->dispatch();
    }

}