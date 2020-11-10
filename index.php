<?php
require 'vendor/autoload.php';
use TheRealMVP\TeamHydrator;



$select_query = ("SELECT teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`name` AS `sport`, countries.`name` AS `country`
    FROM `teams` 
    INNER JOIN `sports` ON teams.`sport`= sports.`id`
    INNER JOIN `countries` ON teams.`country`=countries.`id`;");


$data = TeamHydrator::getData($select_query);
\TheRealMVP\DisplayData::displayTeams($data);

