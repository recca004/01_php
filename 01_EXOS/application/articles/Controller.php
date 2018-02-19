<?php
class Controller extends ControllerCommon{
    
    protected function _setDatas(){
        
        switch ($this->_action){
            case 'detail':
                $this->_datas = $this->_article($_GET['id']);
                break;
            case 'show':
                $this->_view = 'articles/article_form';
                break;
            case 'insert':
                $this->_insert();
                break;
            case 'delete':
                $this->_delete();
                break;
            case 'edit':
                $this->_edit();
                break;
      
                
            default :
                $this->_datas=  $this->_articles();
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

        $this->_view = 'articles/articles';

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

        $this->_view = 'articles/article_detail';

        return $datas;
    }
    
    private function _insert()
    {
        $datas = $_POST;
        
        if (empty($datas['TitleArticle'])) {
            $datas['error']['titleempty'] = true;
        }

        if (empty($datas['IntroArticle'])) {
            $datas['error']['introempty'] = true;
        }

        if (empty($datas['ContentArticle'])) {
            $datas['error']['contentempty'] = true;
        }

        if (isset($datas['error'])) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return;
        }

        $db = Db::connect();
        
        $TitleArticle = $db->real_escape_string( $datas['TitleArticle'] );
        $IntroArticle = $db->real_escape_string( $datas['IntroArticle'] );
        $ContentArticle = $db->real_escape_string( $datas['ContentArticle'] );
        
        $query = 'INSERT INTO articles VALUES( NULL, \''.$TitleArticle.'\', \''.$IntroArticle.'\', \''.$ContentArticle.'\' )';
        
        $db->query( $query );
        
        if( $db->errno )
        {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return;
        }
        
    

        $this->_datas = $this->_articles();
        $this->_view = 'articles/articles';
        //$this->_view = 'articles/article_form';
    }
    
private function _delete(){
    
    
    $db = Db::connect();
    
    $id=$db->real_escape_string( $_GET['id'] );
    $query = 'DELETE FROM articles WHERE IdArticle = '.$id;
    $db->query($query);
    
    
        
        $this->_view = 'articles/article';
        $this->_datas = $this->_articles();
        
    }
    
private function _edit(){
        
     $db = Db::connect();
    
     $id=$db->real_escape_string( $_GET['id'] );
    }


}
