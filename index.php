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
        <?php

use TheRealMVP\DBImport;
use TheRealMVP\DisplayData;
use TheRealMVP\GetAPI;
use TheRealMVP\TeamHydrator;

require_once './vendor/autoload.php'; ?>
        <header>
            <h1>The Real MVP</h1>
        </header>
        <main>
                <?php 
                $api = new GetAPI();
                $pdoConnection = \TheRealMVP\PDO::createPDO();
                $db = new DBImport($pdoConnection);
                $db->dropTablesAndCreateTables();
                $db->storeData($api->getJson($api->curlConnection));
                $hydrator = TeamHydrator::getData($pdoConnection);
                echo DisplayData::displayAllTeams($hydrator); ?>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>