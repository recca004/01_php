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

class Bootstrap{
public static $_page;
public static $_action;
public static $_router;
public static function url()
{
$router = ( empty( $_GET['page'] ) ) ? 'articles' : $_GET['page'];
if( !empty( $router ) )
{
$parts = explode( '/', $router );
self::$page = ( isset( $parts[0] ) ) ? $parts[0] : '';
self::$action = ( isset( $parts[1] ) ) ? $parts[1] : '';
self::$router = ( isset( $parts[2] ) ) ? $parts[2] : '';
}
if( !file_exists( SITE_PATH. '/application/' .self::$_page.
'/Controller.php' ) )
{
header('HTTP/1.0 404 NOT FOUND');
include SITE_PATH . '/view/404.php';
exit;
}
}
} 