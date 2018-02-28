<?php
namespace application\articles;

use includes\Db;

class ModelPosts
{

    public function articles()
    {
        $datas = array();

        $db = Db::connect();

        $results = $db->query( 'SELECT * FROM articles' );

        if( !$db->errno && $results->num_rows > 0 )
        {
            while ( $row = $results->fetch_array() ){
                $datas['articles'][] = $row;
            }
        }

        return $datas;
    }


    public function article( $id )
    {
        $datas = array();

        if ( !empty( $id ) ){
            $db = Db::connect();

            $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

            if( !$db->errno && $results->num_rows > 0 )
            {
                $datas['articles'] = $results->fetch_array();
            }
        }
        
        return $datas;
    }
    
    
    public function show( $id )
    {
        $datas = array();
        
        if ( !empty( $id ) && is_numeric( $id ))
        {
            $datas = $this->article( $id );
            $datas['formUrl'] = SITE_URL . '/articles/update/' . $id;
        }
        else
        {
            $datas['formUrl'] = SITE_URL . '/articles/insert';
        }
        
        return $datas;
    }

    
    public function insert()
    {
        $datas['articles'] = $_POST;
        
        if (empty($datas['articles']['TitleArticle']))
        {
            $datas['error']['TitleArticle'] = ERROR_TYPE_EMPTY;
        }
        if (empty($datas['articles']['IntroArticle']))
        {
            $datas['error']['IntroArticle'] = ERROR_TYPE_EMPTY;
        }
        if (empty($datas['articles']['ContentArticle']))
        {
            $datas['error']['ContentArticle'] = ERROR_TYPE_EMPTY;
        }

        if (isset($datas['error']))
        {
            return $datas;
        }

        $db = Db::connect();
        
        $TitleArticle = $db->real_escape_string($datas['articles']['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['articles']['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['articles']['ContentArticle']);

        $query = 'INSERT INTO articles VALUES ( NULL, \'' . $TitleArticle . '\', \'' . $IntroArticle . '\', \'' . $ContentArticle . '\' )';

        $db->query($query);
        
        if( $db->errno )
        {
            $datas['error']['DB'] = $db->errno;
        }
        
        return $datas;
        //header('Location:' . SITE_URL . '/articles');
    }

    /**
    * Mise à jour de donnees
    * @param string $table la table d'insertion
    * @param array $values les champs et valeurs respectivement key=>value
    * @param string $id l'identifiant pour l'insertion
    */    
    public function update( $id )
    {
        $datas['articles'] = $_POST;

        if (empty($datas['articles']['TitleArticle']))
        {
            $datas['error']['TitleArticle'] = ERROR_TYPE_EMPTY;
        }
        if (empty($datas['articles']['IntroArticle']))
        {
            $datas['error']['IntroArticle'] = ERROR_TYPE_EMPTY;
        }
        if (empty($datas['articles']['ContentArticle']))
        {
            $datas['error']['ContentArticle'] = ERROR_TYPE_EMPTY;
        }
        if ( empty( $id ) )
        {
            $datas['error']['id'] = ERROR_TYPE_EMPTY;
        }

        if (isset($datas['error']) )
        {
            return $datas;
        }

        $db = Db::connect();
        
        $TitleId = $db->real_escape_string( $id );
        $TitleArticle = $db->real_escape_string($datas['articles']['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['articles']['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['articles']['ContentArticle']);

        $query = 'UPDATE articles SET '
                . 'TitleArticle = \'' . $TitleArticle . '\', '
                . 'IntroArticle = \'' . $IntroArticle . '\', '
                . 'ContentArticle = \'' . $ContentArticle . '\' '
                . 'WHERE IdArticle = \'' . $TitleId . '\'';
        
        $db->query($query);
        
        if( $db->errno )
        {
            $datas['error']['DB'] = $db->errno;
        }
        
        return $datas;
        
    }
    
    public function delete( $id )
    {
        $datas = array();
        
        if ( !empty( $id ) )
        {
            $db = Db::connect();

            $db->query( 'DELETE FROM articles WHERE IdArticle = \''.$db->real_escape_string( $id ).'\'' );
            
            if( $db->errno )
            {
                $datas['error']['DB'] = $db->errno;
            }
        }
        
        return $datas;
    }
    
    
    public function backUrl( $page, $action, $router )
    {
        if ( !empty( $router ) && ( $action == 'show' || $action == 'insert' || $action == 'update' ) )
        {
            return '<a class="button" href="' . SITE_URL . '/articles/detail/' . $router . '"><i class="material-icons">reply</i> Retour à l\'article</a>';
        }
        else
        {
            return '<a class="button" href="' . SITE_URL . '/articles"><i class="material-icons">reply</i> Retour aux articles</a>';
        }
    }
    
}
