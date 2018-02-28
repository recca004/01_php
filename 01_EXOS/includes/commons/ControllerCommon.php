<?php
namespace includes\commons;

/**
 * Description of ControllerCommon
 *
 * @author PA6
 */
class ControllerCommon extends Text
{
    protected $_page;
    protected $_action;
    protected $_view;
    protected $_datas;
    protected $_router;
    
    
    function __construct( $page, $action, $router )
    {
        $this->_page = $page;
        $this->_action = $action;
        $this->_router = $router;
        $this->_setDatas();
    }
    
    public function displayResultMessage()
    {
        
        if ( !empty( $this->_datas['result'] ) )
        {
            
            $errorMessage = '';
            
            if ( !empty( $this->_datas['error'] ) )
            {
                $class = 'error';
            
                /**
                 * Check all error
                 */
                foreach ( $this->_datas['error'] as $field => $type)
                {

                    /**
                     * Get the text if set
                     */
                    if ( isset( $this->_textForm[$field][$type] ) )
                    {
                        $errorMessage.= '- ' . $this->_textForm[$field][$type] . '<br>';
                    }
                    else
                    {
                        $errorMessage.= '- ' . str_replace(['#field#', '#type#'], [$field, $type], TEXT_MISSING_FIELD) . '<br>';
                    }
                    
                }
            }
            else
            {
                $class = 'success';
            }

            echo '<div id="message_display" class="' . $class . '"><p class="' . $class . '">'
                . $this->_datas['result'] . '<br>' . $errorMessage
                . '</div>'
                . '<script>document.getElementById("message_display").onclick=function(){this.classList.add("hide");};</script>';
            
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
