<?php

class Controller extends ControllerCommon{
   
    protected function _setDatas(){
        switch ($this->_action){
            
            case 'send':
                $this->_checkMessageSent();
                break;
            
            default :
                $this->_view = 'contact/contact';
                break;
        }
    }  
    
    /**
     * vérifie les champs du formulaire et envoie l'émail 
                                        * si aucune erreur n'est trouvé
     * @return array
     */
    private function _checkMessageSent()
{
    $datas = array();
    
    if($this->_action === 'send' )
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
            // send message by mail
            // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ],
                                        //   'From:'.$datas[ 'email' ] );
            
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


