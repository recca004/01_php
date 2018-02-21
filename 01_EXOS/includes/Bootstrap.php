<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author PA3
 */
class Bootstrap {
    public static $_page;
    public static $_action;
    public static $_router;

    //put your code here
    //lookup page 42 à 45
    public static function url(){
        $router= ( isset( $this->_page ) ) ? $this->_page : '';


        $url = explode( '/', $urlPath );

        $page   = ( !empty( $url[0] ) ) ? $url[0] : 'articles';

        $action = ( isset( $url[1] ) ) ? $url[1] : '';

        $router = ( isset( $url[2] ) ) ? $url[2] : '';

        if(!file_exists(SITE_PATH . '/application/'.$page.'/Controller.php')){
            header('HTTP/1.0 404 NOT FOUND');
            include SITE_PATH . '/view/404.php';
            exit;
        }
        
    } 
    
}
