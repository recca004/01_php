<?php

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

        if($this->_action === 'send' )
        {
            $datas = $_POST;
            
            if( empty( $_POST[ 'email' ] ) )
            {
                $datas[ 'error' ][ 'email' ] = 'empty';
            }
            else if( !filter_var( $_POST[ 'email' ], FILTER_VALIDATE_EMAIL ) )
            {
                $datas[ 'error' ][ 'email' ] = 'invalid';
            }
            if( empty( $_POST[ 'message' ] ) )
            {
                $datas[ 'error' ][ 'message' ] = 'empty';
            }

            if ( isset($datas['error']) )
            {
                $this->_datas = $datas;
                $this->_datas['result'] = SEND_ERROR;
                $this->_view = 'contact/contact';
                return;
            }
            // send message by mail
            // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );
            
            $this->_datas['result'] = SEND_SUCCESS;
            $this->_view = 'contact/contact_sent';
        }
        else
        {
            $this->_view = 'contact/contact';
        }

        $this->_datas = $datas;
    }
    
    
}
