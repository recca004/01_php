<?php

/**
 * General message
 */
define ( 'SAVE_SUCCESS',    'Enregistrement effectué avec succès.' );
define ( 'SAVE_ERROR',      'Une erreur est survenue lors de l\'enregistrement.' );
define ( 'SEND_SUCCESS',    'L\'envoi a été effectué avec succès.' );
define ( 'SEND_ERROR',      'Une erreur est survenue lors de l\'envoi.' );
define ( 'REMOVE_SUCCESS',  'Suppression effectuée avec succès.' );
define ( 'REMOVE_ERROR',    'Une erreur est survenue lors de la suppression.' );

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
        'TitleArticle' =>   ['empty' => 'Aucun titre n\'a été indiqué.'], 
        'IntroArticle' =>   ['empty' => 'Aucune introduction n\'a été indiquée.'],
        'ContentArticle' => ['empty' => 'Aucun contenu n\'a été indiqué.'],
        'email' =>          ['empty' => 'Aucune adresse n\'a été indiquée',
                             'invalid' => 'Le format de l\'adresse n\'est pas conforme.'],
        'message' =>        ['empty' => 'Aucune message n\'a été indiqué.']
    );
    
}
