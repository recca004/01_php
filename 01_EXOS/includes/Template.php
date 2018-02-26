<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 * Gestion des Templates
 * @author PA3
 */
class Template {
    /**
     * initialise le chargement du template principale qui et view/page.php
     */
    public static function page(){
        self::render('page');
        
    }
    
    
    /**
     * Charger un module et son controller
     */
    public static function includeModule($module, $action='', $router=''){
        include_once  SITE_PATH . '/application/' .$module. '/Controller.php';
        
        $controllerNamespace='application\\'.$module.'\\Controller';

        $Controller = new $controllerNamespace($module, $action, $router);


        $datas = $Controller->get_datas();
        $view = $Controller->get_view();
        self::render($view, $datas);
    }
    
    
    /**
     * Transmettre les données à la vue
     */
    
    public static function render($view, $datas=''){
        
        include SITE_PATH . '/view/'.$view.'.php';
    }
    
}
