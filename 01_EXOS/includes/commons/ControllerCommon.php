<?php

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

  public function get_view(){
    return $this->_view;
  }

}
