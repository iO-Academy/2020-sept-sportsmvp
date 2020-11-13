<?php

namespace TheRealMVP;

require_once './vendor/autoload.php';

use TheRealMVP\Importers\DBImport;
use TheRealMVP\Importers\GetAPI;
use TheRealMVP\Importers\PDO;

$pdoConnection = PDO::createPDO();
$db = new DBImport($pdoConnection, new GetAPI());
$db->dropTablesAndCreateTables();
$db->storeData();
