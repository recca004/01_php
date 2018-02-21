<?php
define ( 'SITE_PATH', realpath( dirname(__FILE__) ) );
$site_url = str_replace('\\', '/', str_replace( realpath( $_SERVER[ 'DOCUMENT_ROOT' ] ), '', SITE_PATH ) );
define ( 'SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $site_url );

$urlPath=(isset($_GET['page'])) ? $_GET['page'] : '';

$url = explode('/', $urlPath);

$page = (isset($url[0])) ? $url[0] : '';

$action=(isset($url[1])) ? $url[1] : '';

$router =(isset($url[2])) ? $url[2] : '';

echo $page;
echo $action;
echo $router;


include SITE_PATH . '/includes/Db.php';
include SITE_PATH . '/includes/Commons/ControllerCommon.php';

include SITE_PATH . '/application/'.$page.'/Controller.php';

$Controller=new Controller($page, $action);

$datas=$Controller->get_Datas();
$view = $Controller->get_view();



include SITE_PATH . '/view/page.php';
