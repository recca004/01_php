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
                $this->_datas=$this->_article($_GET['id']);
                break;
            default :
                $this->_datas=$this->_articles();
                break;
        }
    }







    private function _articles()
    {
        $datas = array();

        $db = Db::connect();

        $results = $db->query( 'SELECT * FROM articles' );

        if( !$db->errno && $results->num_rows > 0 )
        {
            $datas[ 'articles' ] = $results;
        }

        $this->_view  = 'articles/articles';

        return $datas;
    }


    private function _article( $id )
    {
        $datas = array();

        $db = Db::connect();

        $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

        if( !$db->errno && $results->num_rows > 0 )
        {
            $datas[ 'article' ] = $results;
        }

        $this->_view  = 'articles/article_detail';

        return $datas;
    }
    private function _articleshow( $id ){
        $datas = array();

        $db = Db::connect();

        $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

        if( !$db->errno && $results->num_rows > 0 )
        {
            $datas[ 'article' ] = $results;
        }

        //$datas[ 'view' ] = 'articles/article_form';
         $datas=$this->_view  = 'contact/contact';

        return $datas;
    }


    public function get_datas(){
        return $this->_datas;
    }
    public function get_view(){
        return $this->_view;
    }
}
