<?php
namespace TheRealMVP;
use PDO;

/**Connects to database
 *
 * No params given
 *
 * @return PDO
 */
class dbConn
{
    public static function connect()
    {
        $pdo = new PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}