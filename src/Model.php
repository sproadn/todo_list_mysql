<?php

namespace App;

class Model
{
    protected $pdo;

    public function __construct()
    {
        $databaseConfig = parse_ini_file(__DIR__.'/../config.ini');
        $pdoConnection = 'mysql:server='.$databaseConfig['DB_HOSTNAME'].':'.$databaseConfig['DB_PORT'].';dbname='.$databaseConfig['DB_DATABASE'];
       
        try {
            $this->pdo = new \PDO($pdoConnection, $databaseConfig['DB_USER'], $databaseConfig['DB_PASS']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $exception) {
            echo "ERROR: " . $exception->getMessage();
        }
    } 

    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}

