<?php
require_once 'dbConn.php';

/**Pulls info from the database
 *
 * @param $connection & $query
 *
 * @return string & integer
 */
function getData($connection, $query) {
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $active_query = $connection->prepare($query);
    $active_query->execute();
    return $active_query->fetchAll();
}



$select_query = ("SELECT teams.`name`, teams.`photo`, teams.`team_color`, teams.`desc`, sports.`name` AS `sport`, countries.`name` AS `country`
FROM `teams` 
INNER JOIN `sports` ON teams.`sport`= sports.`id`
INNER JOIN `countries` ON teams.`country`=countries.`id`;");

$data = getData($connection, $select_query);