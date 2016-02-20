<?php

/**
 * Created by PhpStorm.
 * User: Kali
 * Date: 19/02/2016
 * Time: 13:38
 */

ini_set('display_errors', true);
error_reporting(-1); // show all errors

class pdoDB {
    // private statics to hold the connection
    private static $dbConnection = null;

    // make the next 2 functions private to prevent normal
    // class instantiation
    private function __construct() {
    }
    private function __clone() {
    }

    /**
     * Return DB connection or create initial connection
     * @return object (PDO)
     * @access public
     */
    public static function getConnection() {
        // if there isn't a connection already then create one
        if ( !self::$dbConnection ) {
            try {
                self::$dbConnection = new PDO('mysql:host=127.0.0.1;dbname=unn_w12019664', 'unn_w12019664', 'Moonymoon1' );
                self::$dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch( PDOException $e ) {
                // in a production system you would log the error not display it
                echo $e->getMessage();
            }
        }
        // return the connection
        return self::$dbConnection;
    }

}

?>