<?php

    class Database {

        public static $db;

        public static function connectDB(){

            $dsn = 'mysql:host=localhost;dbname=cms';
            $username = 'root';
            $password = '';

            try{
              self::$db = new PDO($dsn, $username, $password);
              self::$db->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            }catch(PDOExeption $e){
              $e->getMessage();
            }
            return self::$db;
        }

    }

    Database::connectDB();
