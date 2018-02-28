<?php
namespace application\contact;

use includes\commons\ControllerCommon;

class Controller extends ControllerCommon
{
    
    protected function _setDatas()
    {
        switch ( $this->_action )
        {
            default : 
                    $this->_checkMessageSent();
                break;
        }
    }
    
    private function _checkMessageSent()
    {
        $datas = array();

        if( $this->_action === 'send' )
        {
            $datas['contact'] = $_POST;
            
            if( empty( $datas['contact'][ 'email' ] ) )
            {
                $datas[ 'error' ][ 'email' ] = ERROR_TYPE_EMPTY;
            }
            else if( !filter_var( $datas['contact'][ 'email' ], FILTER_VALIDATE_EMAIL ) )
            {
                $datas[ 'error' ][ 'email' ] = ERROR_TYPE_INVALID;
            }
            if( empty( $datas['contact'][ 'message' ] ) )
            {
                $datas[ 'error' ][ 'message' ] = ERROR_TYPE_EMPTY;
            }

            if ( isset($datas['error']) )
            {
                $datas['result'] = SEND_ERROR;
                $this->_view = 'contact/contact';
            }
            else
            {
                // send message by mail
                // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );

                $datas['result'] = SEND_SUCCESS;
                $this->_view = 'contact/contact_sent';
            }
        }
        else
        {
            $this->_view = 'contact/contact';
        }

        $this->_datas = $datas;
        
        $this->displayResultMessage();
        
    }
    
    
}
