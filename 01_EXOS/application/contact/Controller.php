<?php
/**
 * Page contact 
 */
class Controller extends ControllerCommon{


<<<<<<< HEAD


class Controller{

    private $_page;
    private $_action;
    private $_view;
    private $_datas;
    
    public function __construct($page, $action){
        $this->_page=$page;
        $this->_action=$action;
        $this->_setDatas();
    }
    
    
    
    private function _setDatas(){
        
        switch ($this->_action){
            case 'send':
                $this->_datas=$this->_checkMessageSent();
                break;
            default :
                $this->_datas['view'] = 'contact/contact';
                break;
        }
    }
          public function get_Datas(){
        return $this->_datas;
    }
    
    private function _checkMessageSent()
    {
    $datas = array();
    
    
    
    if($this->_action === 'send' )
    {
        $datas = $_POST;
=======
    
    protected function _setDatas(){
        
        switch ($this->_action){
            case 'send':
                $this->_checkMessageSent();
                break;
                
            default :
                $this->_view = 'contact/contact';
>>>>>>> mario2

                break;
        }
    }
    
    /**
     * Vérifie les champs du formulaire et envoi si aucune erreur n'est trouvée
     * @param string $action 
     * @return array
     * 
     * 
     */
     
    private function _checkMessageSent()
    {
        $datas = array();

        if($this->_action === 'send' )
        {
            $datas = $_POST;

<<<<<<< HEAD
        if( !isset( $datas[ 'error' ] ) )
        {
            // send message by mail
            // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );
            
            $datas[ 'view' ] = 'contact/contact_sent';
        }
        else
        {
            $datas[ 'view' ] = 'contact/contact';
        }
    }
    else
    {
        $datas[ 'view' ] = 'contact/contact';
=======
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
                $this->_view  = 'contact/contact';
            }
        }
        else
        {
            $this->_view  = 'contact/contact';
        }


        $this->_datas=$datas;
>>>>>>> mario2
    }
    

}
<<<<<<< HEAD

}

=======
    
    
    
    
   
>>>>>>> mario2
