<?php
/**
 * operations with nodes from DB
 */
class Application_Model_Node extends Zend_Db_Table_Abstract
{         
    protected $_name               = 'node';
    protected $_node_tags          = 'node_tags';
 
    /**    *
    * @param integer $node_url
    * @return array $node_id_type
    */
    public function get_node_id_type($node_url)
    {
        $select = $this->getAdapter()->select()
            ->from($this->_name, array('id','type'))
            ->WHERE('url = ?', $node_url)            
            ->limit(1)
            ;       
        $stmt = $this->getAdapter()->query($select);            
        $node_id_type = $stmt->fetch(); 
        return $node_id_type;
    }
    

}