<?php
namespace TheRealMVP;
use TheRealMVP\Importer\DBImport;
use TheRealMVP\Importer\GetAPI;

$db = new DBImport($pdoConnection, new GetAPI());
$db->dropTablesAndCreateTables();
$db->storeData();