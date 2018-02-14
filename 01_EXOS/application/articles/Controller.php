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
            case 'insert':
                $this->_datas=_insertArticle();
            default :
                $this->_datas=  $this->_articles();
                break;
        }
    }



// INSERT
    private function _insertArticle(){
	
   $db = Db::connect();
   
    $statement=$db->prepare('INSERT INTO articles( TitleArticle, ContentArticle, DateArticle, AuthorArticle) VALUES( ?, ?, NOW(), ?)');
    $statement->bind_param( 'sss', $_POST['TitreArticle'], $_POST['ContenuArticle'], $_POST['AuteurArticle'] );
    $statement->execute();

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

        $datas[ 'view' ] = 'articles/articles';

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

        $datas[ 'view' ] = 'articles/article_detail';

        return $datas;
    }


    public function get_Datas(){
        return $this->_datas;
    }
}
