<?php

session_start();

use TheRealMVP\Importers\PDO;
use TheRealMVP\Hydrators\SportHydrator;
use TheRealMVP\Hydrators\TeamHydrator;
use TheRealMVP\DisplayHelpers\DisplayData;
use TheRealMVP\DisplayHelpers\DisplaySport;

require_once './vendor/autoload.php';

$pdoConnection = PDO::createPDO();
$hydrator = TeamHydrator::getData($pdoConnection);
$sportHydrator = SportHydrator::getData($pdoConnection);

?>

<!DOCTYPE HTML>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#111111">
        <title>The Real MVP</title>
        <link rel="icon" type="image/x-icon" href="./app/images/favicon.ico">
        <link type='text/css' rel='stylesheet' href='./app/css/normalize.css' />
        <link type='text/css' rel='stylesheet' href='./app/css/style.css' />
    </head>
    <body>
        <header>
            <h1>The Real MVP</h1>
        </header>
        <form method="GET">
            <label for="filter">Filter by</label>
            <select name="sport">
                <option value="">All Sports</option>
               <?php echo DisplaySport::displayAllSport($sportHydrator); ?>
            </select>
        <input class="submit" type="submit" value="Submit">
        <input type="submit" value="Clear">
       
        </form>
        <main>
            <?php echo DisplayData::displayAllTeams($hydrator); ?>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>