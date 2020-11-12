<?php

namespace TheRealMVP;

use TheRealMVP\Importers\DBImport;
use TheRealMVP\Importers\GetAPI;

$db = new DBImport($pdoConnection, new GetAPI());
$db->dropTablesAndCreateTables();
$db->storeData();