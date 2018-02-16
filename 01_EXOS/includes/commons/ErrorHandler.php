<?php

class ErrorHandler extends Text
{
    private $_datas;
    private $_fixedMessage;
    private $_classInput;
    private $_messageInput;
    
    function __construct( $datas )
    {
        $this->_datas = $datas;
        $this->_setErrorMessage();
    }
    
    private function _setErrorMessage()
    {
        $this->_fixedMessage = '';
        $this->_classInput = array();
        $this->_messageInput = array();
        
        if ( isset( $this->_datas['error'] ) )
        {
            
            /**
             * If an error occured, start the fixed message with this text
             */
            $message = $this->_datas['result'] . '<br>';
            
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
                    $message.= '- ' . $this->_textForm[$field][$type] . '<br>';
                    $messageInput = $this->_textForm[$field][$type];
                }
                else
                {
                    $message.= '- ' . str_replace(['#field#', '#type#'], [$field, $type], TEXT_MISSING_FIELD) . '<br>';
                    $messageInput = str_replace(['#field#', '#type#'], [$field, $type], TEXT_MISSING_FIELD);
                }
                
                /**
                 * Set the class and the message to display in the form
                 */
                $this->_classInput[$field] = 'form-' . $type;
                $this->_messageInput[$field] = '<span class="' . $type . '">'
                    . $messageInput
                    . '</span><br>';

            }
            
            /**
             * Set the fixed message display (if error)
             */
            $this->_fixedMessage = '<div id="message_display" class="error">'
                . $message
                . '</div>';
            
        }
        else if ( isset( $this->_datas['result'] ) )
        {
            
            /**
             * Set the fixed message display (if no error)
             */
            $this->_fixedMessage = '<div id="message_display" class="success">'
                . $this->_datas['result']
                . '</div>';
        }
        
        /**
         * If the message is displayed, add javascript to close the message on click
         */
        if ( !empty( $this->_fixedMessage ) )
        {
            $this->_fixedMessage.= '<script>document.getElementById("message_display").onclick=function(){this.classList.add("hide");};</script>';
        }
        
    }
    
    public function get_fixedMessage()
    {
        echo $this->_fixedMessage;
    }
    
    public function get_class($field)
    {
        if ( isset( $this->_classInput[$field] ))
        {
            return $this->_classInput[$field];
        }
    }
    
    public function get_message($field)
    {
        if ( isset( $this->_messageInput[$field] ))
        {
            return $this->_messageInput[$field];
        }
    }
    
}
