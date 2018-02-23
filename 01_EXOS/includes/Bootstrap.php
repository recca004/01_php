<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author JV
 */
class Bootstrap {

    public static $page;
    public static $action;
    public static $router;

    public static function url()
    {
        
        $urlPath = ( !empty($_GET['page']) ) ? $_GET['page'] : '';
        
        $parts = explode('/', $urlPath);
        
        self::$page = ( !empty($parts[0]) ) ? $parts[0] : 'articles';
        self::$action = ( isset($parts[1]) ) ? $parts[1] : '';
        self::$router = ( isset($parts[2]) ) ? $parts[2] : '';
            
        if (!file_exists(SITE_PATH . '/application/' . self::$page .
                        '/Controller.php')) {
            header('HTTP/1.0 404 NOT FOUND');
            include SITE_PATH . '/view/404.php';
            exit;
        }
    }

}
