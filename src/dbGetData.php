<?php
namespace TheRealMVP;
use PDO;

require_once 'dbConn.php';

/**Pulls info from the database
 *
 * @param $connection & $query
 *
 * @return string & integer
 */
class dbGetData
{

    public static function getData($connection, $query)
    {
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $active_query = $connection->prepare($query);
        $active_query->execute();
        return $active_query->fetchAll();
    }
}