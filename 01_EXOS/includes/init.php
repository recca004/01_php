<?php
/** 
 * Gestion de l'url et du chargement de la page (aussi 404)
 */
include SITE_PATH . '/includes/Bootstrap.php';

Bootstrap::url();

/**
 * Gestion de la connexion à la base de données
 */
include SITE_PATH . '/includes/Db.php';

/**
 * Gestion de la session
 */
session_start();

/**
 * Chargement des classes utilitaires
 */
include SITE_PATH . '/includes/Commons/ControllerCommon.php';

/**
 * Gestion des templates
 */
include SITE_PATH . '/includes/Template.php';

Template::page();




