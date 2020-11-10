<?php


class DBImport
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = new PDO ("mysql:host=db; dbname=test", "root", "password");
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function storeData()
    {
        $curlConnection = curl_init();
        curl_setopt($curlConnection, CURLOPT_URL, 'https://dev.maydenacademy.co.uk/resources/sports_teams/sports.json');
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($curlConnection);
        curl_close($curlConnection);
        $apiData = json_decode($apiData, true);

    $createTables = "DROP TABLE IF EXISTS `countries`;

                        CREATE TABLE `countries` (
                        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                        `name` varchar(255) DEFAULT '',
                        PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                      DROP TABLE IF EXISTS `sports`;

                    CREATE TABLE `sports` (
                     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                     `name` varchar(255) DEFAULT NULL,
                     PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    
                         DROP TABLE IF EXISTS `teams`;

                        CREATE TABLE `teams` (
                          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                          `name` varchar(255) DEFAULT NULL,
                          `sport` int(11) DEFAULT NULL,
                          `country` int(11) DEFAULT NULL,
                          `photo` varchar(255) DEFAULT NULL,
                          `team_color` varchar(255) DEFAULT NULL,
                          `desc` varchar(500) DEFAULT NULL,
                          PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $countryValues = "";
        $countries = $apiData["countries"];
        for($i=0;$i < count($countries);$i++){
            $countryValues .= "(".$countries[$i]["id"]."," ."'".$countries[$i]["name"]."'".")";

            if($i<count($countries)-1){
                $countryValues .= ",";
            }
        };

        var_dump($storeCountries);
        $teamValues = "";
        $teams= $apiData["teams"];
        for($i=0;$i < count($teams);$i++){
            $teamValues .= "("."'".$teams[$i]["name"]."'"."," .$teams[$i]["sport"]."," .$teams[$i]["country"]."," ."'".$teams[$i]["photo"]."'".","
            ."'".$teams[$i]["desc"]."'"." )";

            if($i<count($teams)-1){
                $teamValues .= ",";
            }
        };


        var_dump($storeTeams);

        $sportsValues = "";
        $sports= $apiData["sports"];
        for($i=0;$i < count($sports);$i++){
            $sportValues .= "(".$sports[$i]["id"]."," ."'".$sports[$i]["name"]."'".")";

            if($i<count($sports)-1){
                $sportValues .= ",";
            }
        };

        $storeSports = "INSERT INTO `sports` (`id`,`name`)
                          VALUES $sportValues;";
        $storeCountries = "INSERT INTO `countries` (`id`,`name`)
                          VALUES $countryValues;";
        $storeTeams = "INSERT INTO `sports` (`id`,`name`,`sport`,`country`,`photo`,`desc`)
                          VALUES $teamValues;";

        $store = "INSERT INTO `sports` (`id`,`name`)
                          VALUES $sportValues;";
        var_dump($store);

        $query = $this->pdo->prepare($createTables);
        $query -> execute();
//        $query = $this->pdo->prepare($store);
//        $query -> execute();
    }
}
$db = new DBImport();
$db ->storeData();

