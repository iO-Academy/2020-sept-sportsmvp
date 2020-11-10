<?php
namespace TheRealMVP;
use PDO;


class TeamHydrator {
    /**
     * create database connection and retrieves data and returns an array of team objects
     *
     * @return array
     */
    public static function getData()
    {
        $pdo = new PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $active_query = $pdo->prepare("SELECT teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`name` AS `sport`, countries.`name` AS `country`
        FROM `teams` 
        INNER JOIN `sports` ON teams.`sport`= sports.`id`
        INNER JOIN `countries` ON teams.`country`=countries.`id`;");
        $active_query->setFetchMode(\PDO::FETCH_CLASS, Team::class);
        $active_query->execute();
        return $data = $active_query->fetchAll();
    }
}



