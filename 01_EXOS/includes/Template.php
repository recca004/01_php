<?php

class Template
{

    /**
     * Initialise le chargement du Template principal (/view/page.php)
     */
    public static function page()
    {
        self::render( 'page' ); 
    }
    
    /**
     * Charge un module et son Controller
     */
    public static function includeModule( $page, $action = '', $router = '' )
    {

        include_once SITE_PATH . '/application/' . $page . '/Controller.php';

        $controllerNamespace = 'application\\' . $page . '\\Controller';
        $Controller = new $controllerNamespace( $page, $action, $router );
        
        $datas = $Controller->get_datas();
        $view = $Controller->get_view();

        self::render( $view, $datas );
        
        //$ErrorHandler = new ErrorHandler( $datas );
        
    }

    /**
     * Transmettre les données à la vue
     */
    public static function render($view, $datas = '')
    {
        include SITE_PATH . '/view/' . $view . '.php';
    }

}
