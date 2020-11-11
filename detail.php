<?php
require_once './vendor/autoload.php';
$apiObj = new \TheRealMVP\GetAPI();
$apiData = $apiObj->getJson();
$DB = new \TheRealMVP\DBImport();
$DB->storeData($apiData);
$teamObject = \TheRealMVP\TeamHydrator::getTeam($_GET['team']);

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
        <?php require_once './vendor/autoload.php'; ?>
        <header>
            <a href="index.php" tabindex="1"><button class="homeButton">HOME</button></a>
            <h1 tabindex="2">The Real MVP</h1>
        </header>
        <main class="detailPage">
            <section>
                <h2 tabindex="3"><?php echo $teamObject->name ?? '' ?></h2>
                <div class="content">
                    <img tabindex="4" src="<?php echo $teamObject->photo ?? '' ?>" />
                    <ul tabindex="5">
                        <li>Sport: <?php echo $teamObject->sport ?? '' ?></li>
                        <li>Country: <?php echo $teamObject->country ?? '' ?></li>
                        <li>Colours: <?php echo $teamObject->team_color ?? '' ?></li>
                    </ul>
                </div>
                <p tabindex="6"><?php echo $teamObject->desc ?? '' ?></p>
            </section>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>