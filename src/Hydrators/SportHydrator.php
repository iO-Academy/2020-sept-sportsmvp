<?php

namespace TheRealMVP\Hydrators;
use TheRealMVP\Entities\Sport;

class SportHydrator
{
    /**
     * create database connection and retrieves data and returns an array of sport objects
     *
     * @param \PDO $pdoConnection
     *
     * @return array
     */
    public static function getData(\PDO $pdoConnection) : array
    {
        $active_query = $pdoConnection->prepare("SELECT `id`, `name` FROM `sports`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Sport::class);
        $active_query->execute();
        return $active_query->fetchAll();
    }
}
