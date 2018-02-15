<?php

class Controller extends ControllerCommon{

    
    protected function _setDatas(){
        
        switch ($this->_action){
            case 'send':
                 $this->_checkMessageSent( );
                break;
                
            default :
                $this->_view = 'contact/contact';

                break;
        }
    }
    
    /**
     * Vérifie les champs du formilaire et envoi l'email si aucune erreur n'est truvée
     * @return string
     */
     
private function _checkMessageSent()
{
    $datas = array();
    
    if($action === 'send' )
    {
        $datas = $_POST;

        if( empty( $_POST[ 'email' ] ) )
        {
            $datas[ 'error' ][ 'emailempty' ] = true;
        }
        else if( !filter_var( $_POST[ 'email' ], FILTER_VALIDATE_EMAIL ) )
        {
            $datas[ 'error' ][ 'emailformat' ] = true;
        }

        if( empty( $_POST[ 'message' ] ) )
        {
            $datas[ 'error' ][ 'messageempty' ] = true;
          
        }

        if( !isset( $datas[ 'error' ] ) )
        {
         //send message by mail
          mail( 'bobunae@gmail.com', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );
            
             $this->_view = 'contact/contact_sent';
        }
        else
        {
             $this->_view = 'contact/contact';
        }
    }
    else
    {
         $this->_view = 'contact/contact';
    }
    
    $this->_datas = $datas;
}
    
}