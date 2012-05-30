<?php

class Application_Model_Tags extends Zend_Db_Table_Abstract{  
    protected $_name                    = 'tags';  
    protected $_node_tags               = 'node_tags';
    
    public function get_node_tags($node_id)
    {
        $select = $this->getAdapter()->select()
             ->from(array('tags' => $this->_name),
                    array('tag_name', 'tag_name'))
             ->join(array('node_tags' => $this->_node_tags),
                    'tags.id = node_tags.tag_id')
             ->limit(50);            
        $stmt = $this->getAdapter()->query($select);            
        $node_tags = $stmt->fetchAll();        
        return $node_tags;
    }

}

