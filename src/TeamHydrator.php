<?php
namespace TheRealMVP;
use PDO;

class TeamHydrator {
    public static function getData($query)
    {
        $pdo = new PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $active_query = $pdo->prepare($query);
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Team::class, 'data');
        $active_query->execute();
        return $data = $active_query->fetchAll();
    }
}