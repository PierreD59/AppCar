<?php

/**
 * Class to connect to the data base
 * 
 * @return PDO $db 
 */
class Database
{

// connection settings
    const HOST = "localhost";
    const DBNAME = "AppCar"; // votre base de données
    const LOGIN = "root"; // votre login

    /**
     * Function to connect to the DB
     *
     * @return PDO $db
     */
    static public function DB()
    {
        $db = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::LOGIN);
        return $db;
    }

}


?>
