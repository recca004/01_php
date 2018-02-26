<?php
namespace application\menus;

use \includes\commons\ControllerCommon;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author PA3
 */
    class Controller extends ControllerCommon{
        protected function _setDatas(){
            switch ($this->_action){
                case 'footer':
                    $this->_view='menus/footer';
                    break;
                case 'aside':
                    $this->_view='menus/aside';
                    break;
                default :
                    $this->_view='menus/main';
                break;
            }
        
        }

    }
