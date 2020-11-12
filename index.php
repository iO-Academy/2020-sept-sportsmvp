<?php
session_start();
$_SESSION['sport'] = $_GET['sport'] ?? "";
$_SESSION['country'] = $_GET['country'] ?? "";

use TheRealMVP\DBImport;
use TheRealMVP\DisplayData;
use TheRealMVP\GetAPI;
use TheRealMVP\TeamHydrator;
use TheRealMVP\SportHydrator;
use TheRealMVP\CountryHydrator;
use TheRealMVP\DisplayFilter;

require_once './vendor/autoload.php';

$api = new GetAPI();
$db = new DBImport();
$db->storeData($api->getJson());
$hydrator = TeamHydrator::getData();
$sportHydrator = SportHydrator::getData();
$countryHydrator = CountryHydrator::getData();
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
                <?php echo DisplayFilter::displayFilter($sportHydrator); ?>
            </select>
            <select name="country">
                <option value="">All Countries</option>
                <?php echo DisplayFilter::displayFilter($countryHydrator); ?>
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