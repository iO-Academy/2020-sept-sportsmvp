<?php

use TheRealMVP\Importers\PDO;
use TheRealMVP\Hydrators\TeamHydrator;
use TheRealMVP\Importers\DBImport;
use TheRealMVP\Importers\GetAPI;
use TheRealMVP\DisplayHelpers\DisplayData;

require_once './vendor/autoload.php';

$pdoConnection = PDO::createPDO();
$db = new DBImport($pdoConnection, new GetAPI());
$db->dropTablesAndCreateTables();
$db->storeData();
$teamObject = TeamHydrator::getTeam($_GET['team'], $pdoConnection);

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
            <a href="index.php" tabindex="1"><button class="homeButton">HOME</button></a>
            <h1 tabindex="2">The Real MVP</h1>
        </header>
        <main class="detailPage">
            <?php echo DisplayData::displayOneTeam($teamObject); ?>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>