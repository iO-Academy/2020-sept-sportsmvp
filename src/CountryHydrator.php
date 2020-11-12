<?php

namespace TheRealMVP;

class CountryHydrator
{
    /**
     * create database connection and retrieves data and returns an array of country objects
     *
     * @return array
     */
    public static function getData() : array
    {
        $pdo = new \PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $active_query = $pdo->prepare("SELECT `id`, `name` FROM `countries`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Country::class);
        $active_query->execute();
        return $data = $active_query->fetchAll();
    }
}
