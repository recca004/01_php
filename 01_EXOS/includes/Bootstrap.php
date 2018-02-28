<?php

class Bootstrap
{
    public static $page;
    public static $action;
    public static $router;
    
    public static function url()
    {
        
        $urlPath = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';

        $url = explode( '/', $urlPath );

        self::$page = ( !empty( $url[0] ) ) ? $url[0] : 'articles';
        self::$action = ( isset( $url[1] ) ) ? $url[1] : '';
        self::$router = ( isset( $url[2] ) ) ? $url[2] : '';
        
        if( !file_exists( SITE_PATH. '/application/' .self::$page. '/Controller.php' ) )
        {
            header('HTTP/1.0 404 NOT FOUND');
            include SITE_PATH . '/view/404.php';
            exit;        
        }
        
    }
    
}
