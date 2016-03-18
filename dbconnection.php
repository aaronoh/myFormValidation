<?php

class dbconnection {

    private static $dbconnection = NULL;

    public static function getConnection() {
        if (dbconnection::$dbconnection === NULL) {
            // database access credentials stored in variables 
            $host = "localhost";
            $database = "n00143888playground";
//            $username = "N00143888";
//            $password = "N00143888";
            $username = "root";
            $password = "";


            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            dbconnection::$dbconnection = new PDO($dsn, $username, $password);
            if (!dbconnection::$dbconnection) {
                die("Database connection failed");
            }
        }

        return dbconnection::$dbconnection;
    }

}
