<?php

/* 
 * Gestion de l'url et du chargement de la page (aussi 404) 
 */


include SITE_PATH . '/includes/Bootstrap.php';
Bootstrap::url();


/* 
 * Gestion de la connexion à la base de données 
 */
include SITE_PATH . '/includes/Db.php';

/* 
 * Gestion de la session
 */
session_start();



/* 
 * Chargement des classes utilitaires
 * date, cal etc..
 */

include SITE_PATH . '/includes/commons/ControllerCommon.php';

/* 
 * Gestion des Templates
 */

include SITE_PATH . '/includes/Template.php';

Template::page();
/*
include SITE_PATH . '/application/' . Bootstrap::$page . '/Controller.php';

$Controller = new Controller(Bootstrap::$page, Bootstrap::$action, Bootstrap::$router);


$datas = $Controller->get_datas();
$view = $Controller->get_view();



*/