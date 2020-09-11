<?php


namespace ishop\base;
use ishop\base\TSingleton;

class DB
{

    private static $instance;

    public static function db_conect(){
        $db_config = require_once ROOT . '/config/db_config.php';
        if(self::$instance === null){
            self::$instance = new \PDO($db_config['dsn'], $db_config['user'], $db_config['pass']);
        }
        return self::$instance;
    }

}