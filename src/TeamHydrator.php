<?php
namespace TheRealMVP;
use PDO;

class TeamHydrator {
    public static function getData($query)
    {
        $pdo = new PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $active_query = $pdo->prepare($query);
        $active_query->execute();
        return $data = $active_query->fetchAll();
    }
}