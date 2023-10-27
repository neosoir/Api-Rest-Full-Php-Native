<?php

class Connection {

    /**
     * Get the database info.
     *
     * @return Array
     */
    public static function infoDatabase() {

        $infoDB = [
            "database"  => "api_1",
            "user"      => "neo",
            "pass"      => "hi mysql",
        ];

        return $infoDB;

    }

    /**
     * Database connection.
     *
     * @return Object
     */
    public static function connect() {

        $connection = self::infoDatabase();

        try {
            
            $link = new PDO(
                "mysql:host=localhost;dbname=" . $connection["database"],
                $connection["user"],
                $connection["pass"]
            );
            $link->exec("set names utf8");

        } 
        
        catch (PDOException $e) {

            die( "Error: " . $e->getMessage() );

        }

        return $link;

    }

}