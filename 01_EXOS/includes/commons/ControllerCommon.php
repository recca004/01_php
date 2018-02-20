<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerCommon
 *
 * @author PA6
 */
class ControllerCommon
{
    protected $_page;
    protected $_action;
    protected $_view;
    protected $_datas;
    
    function __construct( $page, $action )
    {
        $this->_page = $page;
        $this->_action = $action;
        $this->_setDatas();
    }
    
    private function _fieldValue($fieldName)
    {
        return ( isset( $this->_datas[$fieldName] ) ) ? $this->_datas[$fieldName] : '';
    }
    
    public function generateFormField( $fieldName, $type, $placeHolder )
    {
        
        $Err = new ErrorHandler( $this->_datas );
        
        if ( $type == 'text' )
        {
            echo    '<label for="' . $fieldName . '">'
                    . $Err->get_message($fieldName)
                    . '<input type="' . $type . '" class="' . $Err->get_class($fieldName) . '" '
                    . 'name="' . $fieldName . '" '
                    . 'id="' . $fieldName . '" '
                    . 'value="' . $this->_fieldValue($fieldName) . '" '
                    . 'placeholder="' . $placeHolder . '" />'
                    . '</label>';
        }
        else if ( $type == 'textarea' )
        {
            echo    '<label for="' . $fieldName . '">'
                    . $Err->get_message($fieldName)
                    . '<textarea class="' . $Err->get_class($fieldName) . '" '
                    . 'name="' . $fieldName . '" '
                    . 'id="' . $fieldName . '" '
                    . 'placeholder="' . $placeHolder . '" />'
                    . $this->_fieldValue($fieldName)
                    . '</textarea></label>';
        }
    }
    
    public function get_datas()
    {
        return $this->_datas;
    }
    
    public function get_view()
    {
        return $this->_view;
    }
    
}
