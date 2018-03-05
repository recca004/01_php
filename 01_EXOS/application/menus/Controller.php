<?php

namespace application\menus;

use includes\commons\ControllerCommon;

class Controller extends ControllerCommon {
   
    protected function _setDatas()
            {
        switch ($this->_action) {
            case 'footer';
                $this->_view = 'menus/footer';


                break;

            default:
                $this->_view = 'menus/main';
                
                break;
        }
        
    }
    
}
