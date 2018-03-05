<?php

/**
 * Gestion de l'URL et de chargement de la page (aussi 404)
 */
include SITE_PATH . '/includes/Bootstrap.php';
Bootstrap::url();

/**
 * Gestion de l'URL et de chargement de la page (aussi 404)
 */
include SITE_PATH . '/includes/Db.php';

/**
 * Gestion de session
 */
session_start();

/**
 * Chargement des classes utilitaires
 */
include SITE_PATH . '/includes/commons/ControllerCommon.php';

/**
 * Gestion de Templates
 */
include SITE_PATH . '/includes/Template.php';

Template::page();


/*

 

 */
?>