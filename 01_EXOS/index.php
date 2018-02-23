<?php
define ( 'SITE_PATH', realpath( dirname(__FILE__) ) ); 
$site_url = str_replace('\\', '/', str_replace( realpath( $_SERVER[ 'DOCUMENT_ROOT' ] ), '', SITE_PATH ) );
define ( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $site_url );

$urlPath = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';


$url = explode( '/', $urlPath );

$page   = ( !empty( $url[0] ) ) ? $url[0] : 'articles';

$action = ( isset( $url[1] ) ) ? $url[1] : '';

$router = ( isset( $url[2] ) ) ? $url[2] : '';

if( !file_exists( SITE_PATH . '/application/' . $page . '/Controller.php' ) )
{
    header('HTTP/1.0 404 NOT FOUND');
    include SITE_PATH . '/view/404.php';
    exit;
}


include SITE_PATH . '/includes/Db.php';
include SITE_PATH . '/includes/commons/ControllerCommon.php';
include SITE_PATH . '/application/'.$page.'/Controller.php';

$Controller = new Controller($page, $action, $router);

$datas = $Controller->get_datas();
$view = $Controller->get_view();
//var_dump($datas);

include SITE_PATH . '/view/page.php';