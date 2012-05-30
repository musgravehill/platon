<?php
/**
 *work with node as page 
 */
class Application_Model_Page extends Zend_Db_Table_Abstract{  
    protected $_name               = 'node';
    protected $_node_tags          = 'node_tags';
    
    public function get_node_data($node_id){
        $node_data = array();
        $select = $this->getAdapter()->select()
            ->from($this->_name)
            ->WHERE('id = ?', $node_id)            
            ->limit(1)
            ;       
        $stmt = $this->getAdapter()->query($select);            
        $node_data['node_fields']   = $stmt->fetch();   
        
        $Model_Tags                 = new Application_Model_Tags();
        $node_data['node_tags']     = $Model_Tags->get_node_tags($node_id);
        
        return $node_data;
    }
    
    

}

