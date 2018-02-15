<?php
class Controller extends ControllerCommon
{
    
    protected function _setDatas()
    {
        switch ($this->_action){
            case 'detail' :
                $this->_article($_GET['id']);
                break;
            
            case 'show' :
                $this->_view = 'articles/article_form';
                break;
            
            case 'insert' :
                $this->_insert();
                break;
                
            default :
                $this->_articles();
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

        $this->_datas = $datas;
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

        $this->_datas = $datas;
    }
    
    
    private function _insert()
    {
        $datas = $_POST;
        
        $db = Db::connect();
        
        if ( empty( $datas['TitleArticle']) ){
            $datas['error']['titleempty'] = true;
        }
        if ( empty( $datas['IntroArticle']) ){
            $datas['error']['introempty'] = true;
        }
        if ( empty( $datas['ContentArticle']) ){
            $datas['error']['contentempty'] = true;
        }
        
        if ( isset( $datas['error'] ) ){
            $this->_datas = $datas;
            $this->_view = 'articles/article_form';
            return;
        }
        
        $TitleArticle = $db->real_escape_string( $datas['TitleArticle'] );
        $IntroArticle = $db->real_escape_string( $datas['IntroArticle'] );
        $ContentArticle = $db->real_escape_string( $datas['ContentArticle'] );
        
        $query = 'INSERT INTO articles VALUES ( NULL, \''.$TitleArticle.'\', \''.$IntroArticle.'\', \''.$ContentArticle.'\' )';
        
        $results = $db->query( $query );
        
        if( !$db->errno )
        {
            $this->_articles();
            $this->_view = 'articles/articles';
        }
        else
        {
            $this->_datas = $datas;
            $this->_view = 'articles/article_form';
        }
        
    }
    
}
