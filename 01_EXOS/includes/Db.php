<?php
Class Db{
    
    private static $_connect;
    
    public static function connect()
    {
        if( !isset( self::$_connect ) )
        {
            $config = parse_ini_file( SITE_PATH . '/includes/config.ini' ); 

            self::$_connect = new mysqli( $config['dbhost'], $config['dbuser'], $config['dbpass'], $config['dbname'], $config['dbport'] );
        
        }
        
        return self::$_connect;
    }
}