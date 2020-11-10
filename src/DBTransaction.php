<?php

namespace TheRealMVP;

use PDO;

class DBTransaction
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=db;dbname=test", "root", "password");
    }

    public function queryDB($sql, $data)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($data);
    }
}