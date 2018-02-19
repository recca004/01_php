<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCommon
 *
 * @author Floh
 */
class ControllerCommon {
    protected $_page;
    protected $_action;
    protected $_view;
    protected $_datas;

    public function __construct($page, $action)
    {
        $this->_page=$page;
        $this->_action=$action;
        $this->_setDatas();
    }
    
    public function get_Datas()
    {
        return $this->_datas;
    }
    
    public function get_view()
    {
        return $this->_view;
    }   
    
    
}
