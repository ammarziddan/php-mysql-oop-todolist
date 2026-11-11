<?php

namespace Config {

    use PDO;

    class Database
    {
        public static function getConnection(): PDO
        {
            $host = 'db';
            $port = '3306';
            $database = 'belajar_php';
            $username = 'root';
            $password = '';

            return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }

    }

}
