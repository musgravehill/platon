<?php

class Platon_Db_Table_Abstract extends Zend_Db_Table_Abstract {

    protected function _setupTableName() {
        parent::_setupTableName();
        $config = $this->_db->getConfig();
        $this->_name = $config['prefix'] . $this->_name;
    }

}