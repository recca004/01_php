<?php



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
            case 'detail':
                
                break;
            case 'insert':
                
            default :
               $this->_datas['view'] = 'contact/contact';
                
                break;
        }
    }
          public function get_Datas(){
        return $this->_datas;
    }
    }

function checkMessageSent( $action )
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
            // send message by mail
            // mail( 'mymail@domain.net', 'Subject', $datas[ 'message' ], 'From:'.$datas[ 'email' ] );
            
            $datas[ 'view' ] = 'contact_sent';
        }
        else
        {
            $datas[ 'view' ] = 'contact';
        }
    }
    else
    {
        $datas[ 'view' ] = 'contact';
    }
    
    return $datas;
}
