<?php
define ( 'SITE_PATH', realpath( dirname(__FILE__) ) ); 
$site_url = str_replace('\\', '/', str_replace( realpath( $_SERVER[ 'DOCUMENT_ROOT' ] ), '', SITE_PATH ) );
define ( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $site_url );

include SITE_PATH . '/includes/Bootstrap.php';

Bootstrap::url();

include SITE_PATH . '/includes/Db.php';
include SITE_PATH . '/includes/Commons/ControllerCommon.php';
include SITE_PATH . '/application/'.Bootstrap::$page.'/Controller.php';


$Controller = new Controller( Bootstrap::$page, Bootstrap::$action, Bootstrap::$router );

$datas = $Controller->get_datas();
$view = $Controller->get_view();



include SITE_PATH . '/view/page.php';