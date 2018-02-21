<?php
define ( 'SITE_PATH', realpath( dirname(__FILE__) ) ); 
$site_url = str_replace('\\', '/', str_replace( realpath( $_SERVER[ 'DOCUMENT_ROOT' ] ), '', SITE_PATH ) );
define ( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $site_url );



if( !file_exists( SITE_PATH . '/application/' . $page . '/Controller.php') )
{
    header('HTTP/1.0 404 NOT FOUND');
    include SITE_PATH . '/view/404.php';
    exit;
}

include SITE_PATH . '/includes/Bootstrap.php';
include SITE_PATH . '/includes/Db.php';
include SITE_PATH . '/includes/Commons/ControllerCommon.php';

include SITE_PATH . '/application/'.$page.'/Controller.php';

Bootstrap::url();


$Controller=new Controller($page, $action, $router);

$datas=$Controller->get_Datas();
$view = $Controller->get_view();



include SITE_PATH . '/view/page.php';