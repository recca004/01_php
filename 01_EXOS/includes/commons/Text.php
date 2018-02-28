<?php
namespace includes\commons;

/**
 * General message
 */
define ( 'SAVE_SUCCESS',        'Enregistrement effectué avec succès.' );
define ( 'SAVE_ERROR',          'Une erreur est survenue lors de l\'enregistrement.' );
define ( 'SEND_SUCCESS',        'L\'envoi a été effectué avec succès.' );
define ( 'SEND_ERROR',          'Une erreur est survenue lors de l\'envoi.' );
define ( 'REMOVE_SUCCESS',      'Suppression effectuée avec succès.' );
define ( 'REMOVE_ERROR',        'Une erreur est survenue lors de la suppression.' );

/**
 * Error type
 */
define ( 'ERROR_TYPE_EMPTY',    'empty' );
define ( 'ERROR_TYPE_INVALID',  'invalid' );

/**
 * 
 */
define ( 'TEXT_MISSING_FIELD', 'Texte manquant pour le champ [#field#] de type [#type#].' );

class Text
{
    
    /**
     * [form input name => [error type => text]
     */
    protected $_textForm = array(
        'DB' =>             ['1146' => 'La table n\'existe pas dans la base de données.', 
                             '1054' => 'Nom de colonne inconnu dans le base de données.'], 
        'TitleArticle' =>   [ERROR_TYPE_EMPTY => 'Aucun titre n\'a été indiqué.'], 
        'IntroArticle' =>   [ERROR_TYPE_EMPTY => 'Aucune introduction n\'a été indiquée.'],
        'ContentArticle' => [ERROR_TYPE_EMPTY => 'Aucun contenu n\'a été indiqué.'],
        'email' =>          [ERROR_TYPE_EMPTY => 'Aucune adresse n\'a été indiquée',
                             ERROR_TYPE_INVALID => 'Le format de l\'adresse n\'est pas conforme.'],
        'message' =>        [ERROR_TYPE_EMPTY => 'Aucune message n\'a été indiqué.']
    );
    
}
