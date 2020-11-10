<?php
namespace TheRealMVP;
require_once '../vendor/autoload.php';


$select_query = ("SELECT teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`name` AS `sport`, countries.`name` AS `country`
    FROM `teams` 
    INNER JOIN `sports` ON teams.`sport`= sports.`id`
    INNER JOIN `countries` ON teams.`country`=countries.`id`;");

$connection = dbConn::connect();
$data = dbGetData::getData($connection, $select_query);
DisplayData::displayTeams($data);