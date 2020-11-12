<?php

namespace TheRealMVP;

class SportHydrator
{
    /**
     * create database connection and retrieves data and returns an array of team objects
     *
     * @return array
     */
    public static function getData() : array
    {
        $pdo = new \PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $active_query = $pdo->prepare("SELECT `id`, `name` FROM `sports`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Sport::class);
        $active_query->execute();
        return $data = $active_query->fetchAll();
    }
}
