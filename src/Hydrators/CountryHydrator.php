<?php

namespace TheRealMVP\Hydrators;
use TheRealMVP\Entities\Country;

class CountryHydrator
{
    private \PDO $pdoConnection;

    /**
     * TeamHydrator constructor - saves PDO connection object as local variable
     *
     * @param $pdoConnection
     */
    public function __construct(\PDO $pdoConnection)
    {
        $this->pdoConnection = $pdoConnection;
    }

    /**
     * create database connection and retrieves data and returns an array of country objects
     *
     * @param \PDO $pdoConnection
     *
     * @return array
     */
    public static function getData(\PDO $pdoConnection) : array
    {
        $active_query = $pdoConnection->prepare("SELECT `id`, `name` FROM `countries`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Country::class);
        $active_query->execute();
        return $active_query->fetchAll();
    }
}
