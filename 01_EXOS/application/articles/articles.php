<?php

function articles()
{
    $datas = array();
    
    $db = Db::connect();

    $results = $db->query( 'SELECT * FROM articles' );

    if( !$db->errno && $results->num_rows > 0 )
    {
        $datas[ 'articles' ] = $results;
    }
    
    $datas[ 'view' ] = 'articles';
    
    return $datas;
}


function article( $id )
{
    $datas = array();
    
    $db = Db::connect();

    $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

    if( !$db->errno && $results->num_rows > 0 )
    {
        $datas[ 'article' ] = $results;
    }
    
    $datas[ 'view' ] = 'article_detail';
    
    return $datas;
}
