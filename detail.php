<?php

use TheRealMVP\Importers\PDO;
use TheRealMVP\Hydrators\TeamHydrator;
use TheRealMVP\Importers\DBImport;
use TheRealMVP\Importers\GetAPI;

require_once './vendor/autoload.php';

$pdoConnection = PDO::createPDO();
$DB = new DBImport($pdoConnection, new GetAPI());
$DB->storeData();
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
            <section>
                <h2 tabindex="3"><?php echo $teamObject->getName() ?? '' ?></h2>
                <div class="content">
                    <img tabindex="4" src="<?php echo $teamObject->getPhoto() ?? '' ?>" />
                    <ul tabindex="5">
                        <li>Sport: <?php echo $teamObject->getSport() ?? '' ?></li>
                        <li>Country: <?php echo $teamObject->getCountry() ?? '' ?></li>
                        <li>Colours: <?php echo $teamObject->getTeamColor() ?? '' ?></li>
                    </ul>
                </div>
                <p tabindex="6"><?php echo $teamObject->getDesc() ?? '' ?></p>
            </section>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>