<?php

class Controller extends ControllerCommon
{
    
    protected function _setDatas()
    {
        switch ( $this->_action )
        {
            case 'detail' : 
                    $this->_article();
                break;
            
            case 'show' : 
                    $this->_article();
                break;
            
            case 'insert' : 
                    $this->_insert();
                break;
            
            case 'update' : 
                    $this->_update();
                break;
            
            case 'delete' : 
                    $this->_delete();
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
            while ( $row = $results->fetch_array() ){
                $datas[] = $row;
            }
        }

        $this->_view = 'articles/articles';

        $this->_datas = $datas;
    }


    private function _article( $_id = null )
    {
        $datas = array();
        
        if ( !empty( $_id ) )
        {
            $id = $_id;
        }
        else if ( isset( $_GET['id'] ) )
        {
            $id = $_GET['id'];
        }
        else
        {
            $id = null;
        }

        if ( $id ){
            $db = Db::connect();

            $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

            if( !$db->errno && $results->num_rows > 0 )
            {
                $datas = $results->fetch_array();
            }
        }
        if ( $this->_action == 'show' )
        {
            $this->_view = 'articles/article_form';
        }
        else
        {
            $this->_view = 'articles/article_detail';
        }
        
        $this->_datas = $datas;
    }

    
    private function _insert()
    {
        $datas = $_POST;
        
        if (empty($datas['TitleArticle']))
        {
            $datas['error']['TitleArticle'] = 'empty';
        }
        if (empty($datas['IntroArticle']))
        {
            $datas['error']['IntroArticle'] = 'empty';
        }
        if (empty($datas['ContentArticle']))
        {
            $datas['error']['ContentArticle'] = 'empty';
        }

        if (isset($datas['error']))
        {
            $this->_datas = $datas;
            $this->_datas['result'] = SAVE_ERROR;
            $this->_view = 'articles/article_form';
            return;
        }

        $db = Db::connect();
        
        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);

        $query = 'INSERT INTO articles VALUES ( NULL, \'' . $TitleArticle . '\', \'' . $IntroArticle . '\', \'' . $ContentArticle . '\' )';

        $db->query($query);
        
        if( $db->errno )
        {
            $this->_datas = $datas;
            $this->_datas['result'] = SAVE_ERROR;
            $this->_view = 'articles/article_form';
        }
        
        header('Location:'.SITE_URL.'/index.php?page=articles');
    }

    /**
    * Mise à jour de donnees
    * @param string $table la table d'insertion
    * @param array $values les champs et valeurs respectivement key=>value
    * @param string $id l'identifiant pour l'insertion
    */    
    private function _update()
    {
        $datas = $_POST;

        if (empty($datas['TitleArticle']))
        {
            $datas['error']['TitleArticle'] = 'empty';
        }
        if (empty($datas['IntroArticle']))
        {
            $datas['error']['IntroArticle'] = 'empty';
        }
        if (empty($datas['ContentArticle']))
        {
            $datas['error']['ContentArticle'] = 'empty';
        }

        if (isset($datas['error']))
        {
            $this->_datas = $datas;
            $this->_datas['result'] = SAVE_ERROR;
            $this->_view = 'articles/article_form';
            return;
        }

        $db = Db::connect();
        
        $id = $db->real_escape_string($_GET['id']);
        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);

        $query = 'UPDATE articles SET '
                . 'TitleArticle = \'' . $TitleArticle . '\', '
                . 'IntroArticle = \'' . $IntroArticle . '\', '
                . 'ContentArticle = \'' . $ContentArticle . '\' '
                . 'WHERE IdArticle = \'' . $id . '\'';
        
        $db->query($query);
        
        if( !$db->errno )
        {
            $this->_article($id);
            $this->_datas['result'] = SAVE_SUCCESS;
            $this->_view = 'articles/article_form';
        }
        else
        {
            $this->_datas = $datas;
            $this->_datas['result'] = SAVE_ERROR;
            $this->_view = 'articles/article_form';
        }
        
    }
    
    private function _delete()
    {
        $id = $_GET['id'];
        
        if ( $id )
        {
            $db = Db::connect();

            $db->query( 'DELETE FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

            if( !$db->errno )
            {
                $this->_datas['result'] = REMOVE_SUCCESS;
            }
            else
            {
                $this->_datas['result'] = REMOVE_ERROR;
            }
        }
        
        $this->_articles();
        $this->_view = 'articles/articles';
    }
    
    
    public function get_backUrl()
    {
        if ( isset ( $_GET[ 'id' ] ) && ( $this->_action == 'show' || $this->_action == 'insert' || $this->_action == 'update' ) )
        {
            echo '<a href="' . SITE_URL . '/index.php?page=articles&action=detail&id=' . $_GET[ 'id' ] . '">&lt; Retour à l\'article</a>';
        }
        else
        {
            echo '<a href="' . SITE_URL . '/index.php?page=articles">&lt; Retour aux articles</a>';
        }
    }
    
    
    public function get_formUrl()
    {
        if ( isset ( $_GET[ 'id' ] ) )
        {
            echo SITE_URL . '/index.php?page=' . $this->_page . '&action=update&id=' . $_GET[ 'id' ];
        }
        else
        {
            echo SITE_URL . '/index.php?page=' . $this->_page . '&action=insert';
        }
    }
    
}
