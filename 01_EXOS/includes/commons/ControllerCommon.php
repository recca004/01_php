<<<<<<< HEAD
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCommon
 *
 * @author Mario Neita
 */
class ControllerCommon {
    //put your code here

    protected $_page;
    protected $_action;
    protected $_router;
    protected $_view;
    protected $_datas;
        
    
    public function __construct($page, $action, $router){
        $this->_page=$page;
        $this->_action=$action;
        $this->_router = $router;
        $this->_setDatas();
    }
    
    
    
    public function get_datas(){
        return $this->_datas;
    }
    public function get_view(){
        return $this->_view;
    }
}
=======
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCommon
 *
 * @author O Dommange
 */
class ControllerCommon {
    
    protected $_page;
    protected $_action;
    protected $_view;
    protected $_datas;
    
    public function __construct($page, $action){
        $this->_page=$page;
        $this->_action=$action;
        $this->_setDatas();
    }
    
    
    public function get_Datas(){
        return $this->_datas;
    }
    
    public function get_view()
    {
        return $this->_view;
    }
    
}
>>>>>>> atelier2
