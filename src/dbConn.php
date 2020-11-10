<?php
/**Connects to database
 *
 * No params given
 *
 * @return PDO
 */
function connect(){
    $pdo = new PDO('mysql:host=db; dbname=TheRealMVP', 'root', 'password');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $pdo;
}
$connection = connect();