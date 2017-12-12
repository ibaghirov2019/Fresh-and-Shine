<?php

/**
 * Class DB
 */
class Db
{

    /**
     * Establishes a connection to the database
     */
    public static function getConnection()
    {
        // Get connection parameters from file
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // Establishing a connection
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // Set the encoding
        $db->exec("set names utf8");

        return $db;
    }

}
