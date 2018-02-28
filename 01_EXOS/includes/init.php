<?php
/**
 * Gestion de l'url, du chargement de la page et de la page 404
 */
include SITE_PATH . '/includes/Bootstrap.php';
Bootstrap::url();

/**
 * Gestion des textes
 */
include SITE_PATH . '/includes/commons/Text.php';

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
include SITE_PATH . '/includes/commons/ControllerCommon.php';

/**
 * Gestion des templates
 */
include SITE_PATH . '/includes/Template.php';
Template::page();



