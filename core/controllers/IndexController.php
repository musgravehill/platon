<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
         $node_url   = 'hella.html'; ///TEST        
         $Model_Node                                    = new Application_Model_Node();
         if ( $node_id_type = $Model_Node->get_node_id_type($node_url)  ) //get node from Db by URL
         {   
            $Model_node_additional_class        = 'Application_Model_'.ucfirst($node_id_type->type);
            $Model_node_additional              = new $Model_node_additional_class();
            $this->view->node_data              = $Model_node_additional->get_node_data($node_id_type->id);
            $this->render($node_id_type->type);            
         }
         
    }

}

