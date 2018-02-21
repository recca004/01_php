<?php
define ( 'SITE_PATH', realpath( dirname(__FILE__) ) ); 
$site_url = str_replace('\\', '/', str_replace( realpath( $_SERVER[ 'DOCUMENT_ROOT' ] ), '', SITE_PATH ) );
define ( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $site_url );



$Bootstrap::url();

include SITE_PATH . '/includes/Db.php';
include SITE_PATH . '/includes/commons/ControllerCommon.php';
include SITE_PATH . '/application/'.$page.'/Controller.php';

$Controller = new Controller($page, $action, $router);
$Bootsrap = new $Bootsrap($page, $action, $router);

$datas = $Controller->get_datas();
$view = $Controller->get_view();
//var_dump($datas);

include SITE_PATH . '/view/page.php';