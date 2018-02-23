<?php
/**
 * Page contact 
 */
class Controller extends ControllerCommon{

<<<<<<< HEAD
=======
class Controller extends ControllerCommon{
>>>>>>> atelier2

    
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
    
<<<<<<< HEAD
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

=======
    
    /**
     * Vérifie les champs du formulaire et envoie l'email si aucune erreur n'est trouvée
     * @return array
     */
    private function _checkMessageSent()
    {
        $datas = array();
  
>>>>>>> atelier2
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
             //send message by mail
              mail( 'bobunae@gmail.com', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );

                $this->_view = 'contact/contact_sent';
            }
            else
            {
<<<<<<< HEAD
                $this->_view  = 'contact/contact';
=======
                $this->_view = 'contact/contact';
>>>>>>> atelier2
            }
        }
        else
        {
<<<<<<< HEAD
            $this->_view  = 'contact/contact';
        }


        $this->_datas=$datas;
    }
    

=======
            $this->_view = 'contact/contact';
        }

        $this->_datas = $datas;
    }

   
>>>>>>> atelier2
}
    
    
    
    
   
