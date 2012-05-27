<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {



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