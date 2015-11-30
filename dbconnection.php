<?php
class dbconnection {

    private static $dbconnection = NULL;

    public static function getConnection() {
        if (dbconnection::$dbconnection === NULL) {
            // connect to the database
            $host = "localhost";
            $database = "noo143888playground";
            $username = "n00143888";
            $password = "n00143888";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
           dbconnection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Database connection failed");
            }
        }

        return Connection::$connection;
    }
}
