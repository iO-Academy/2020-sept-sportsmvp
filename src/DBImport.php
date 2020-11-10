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

    $createTables = "
        DROP TABLE IF EXISTS `countries`;
                        
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
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ";

        $query = $this->pdo->prepare($createTables);
        $query -> execute();


        $countries = $apiData["countries"];
        foreach ($countries as $country) {
            $query = $this->pdo->prepare("INSERT INTO `countries` (`id`, `name`)
                    VALUES (:id, :countryname);");
            $query->bindParam(':id', $country['id']);
            $query->bindParam(':countryname', $country['name']);
            $query->execute();
        }

        $sports= $apiData["sports"];
        foreach ($sports as $sport) {
            $query = $this->pdo->prepare("INSERT INTO `sports` (`id`, `name`)
                    VALUES (:id, :sportname);");
            $query->bindParam(':id', $sport['id']);
            $query->bindParam(':sportname', $sport['name']);
            $query->execute();
        }

        $teams= $apiData["teams"];
        foreach ($teams as $team) {
            $query = $this->pdo->prepare("INSERT INTO `teams` (`name`,`sport`,`country`,`photo`, `team_color`, `desc`)
                    VALUES (:teamname, :sport, :country, :photo,:teamcolor, :teamdesc);");
            $query->bindParam(':teamname', $team['name']);
            $query->bindParam(':sport', $team['sport']);
            $query->bindParam(':country', $team['country']);
            $query->bindParam(':photo', $team['photo']);
            $query->bindParam(':teamcolor', $team['team_color']);
            $query->bindParam(':teamdesc', $team['desc']);
            $query->execute();
        }
    }
}

$db = new DBImport();
$db ->storeData();

