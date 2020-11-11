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
            <button class="homeButton"><a href="index.php">HOME</a></button>
            <h1>The Real MVP</h1>
        </header>
        <main class="detailPage">
                <section class="details">
                    <h2><?php echo $teamObject->name ?? '' ?></h2>
                    <div class="content">
                        <img src="<?php echo $teamObject->photo ?? '' ?>" />
                        <ul>
                            <li>Sport: <?php echo $teamObject->sport ?? '' ?></li>
                            <li>Country: <?php echo $teamObject->country ?? '' ?></li>
                            <li>Colours: <?php echo $teamObject->team_color ?? '' ?></li>
                        </ul>
                    </div>
                    <p><?php echo $teamObject->desc ?? '' ?></p>
                </section>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>