<?php
class DB
{
        private static $instance = null;
        private $pdo;
        private function __construct()
        {
            $dsn = 'mysql:dbname=localhost1;host=localhost';
            $user = 'root';
            $password = 'root';

            $this->pdo= new PDO($dsn,$user,$password)
        }


$dbh = new PDO($dsn, $user, $password);


}