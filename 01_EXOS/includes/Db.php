<?php
Class Db{
    
    private static $_connect;
    
    public static function connect()
    {
        if( !isset( self::$_connect ) )
        {
            $config = parse_ini_file( SITE_PATH . '/includes/config.ini' ); 

            self::$_connect = new mysqli( $config['dbhost'], $config['dbuser'], $config['dbpass'], $config['dbname'], $config['dbport'] );
        
            /* Modification du jeu de résultats en utf8 */
            //echo self::$_connect->character_set_name();
            self::$_connect->set_charset("utf8");
            //echo self::$_connect->character_set_name();
  
        }
        
        return self::$_connect;
    }
}