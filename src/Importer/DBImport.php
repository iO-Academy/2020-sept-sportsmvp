<?php

namespace TheRealMVP\Importer;

class DBImport
{
    private \PDO $pdoConnection;
    private GetAPI $curlConnection;

    /**
     * DBImport constructor - takes in a PDO connection and saves it locally to be used elsewhere in code
     * Takes in a new GetAPI object and saves it locally
     *
     * @param \PDO   $pdoConnection
     * @param GetAPI $curlConnection
     */
    public function __construct(\PDO $pdoConnection, GetAPI $curlConnection)
    {
        $this->pdoConnection = $pdoConnection;
        $this->curlConnection = $curlConnection;
    }

    /**
     * Drops all tables and then initialises them
     */
    public function dropTablesAndCreateTables() : void
    {
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

        $query = $this->pdoConnection->prepare($createTables);
        $query -> execute();
    }

    /**
     * Populates all tables with data from the API
     */
    public function storeData(): void
    {
        $apiData = $this->curlConnection->getJson();
        $countries = $apiData["countries"];
        foreach ($countries as $country) {
            $query = $this->pdoConnection->prepare("INSERT INTO `countries` (`id`, `name`)
                    VALUES (:id, :countryname);");
            $query->bindParam(':id', $country['id']);
            $query->bindParam(':countryname', $country['name']);
            $query->execute();
        }

        $sports = $apiData["sports"];
        foreach ($sports as $sport) {
            $query = $this->pdoConnection->prepare("INSERT INTO `sports` (`id`, `name`)
                    VALUES (:id, :sportname);");
            $query->bindParam(':id', $sport['id']);
            $query->bindParam(':sportname', $sport['name']);
            $query->execute();
        }

        $teams = $apiData["teams"];
        foreach ($teams as $team) {
            $query = $this->pdoConnection->prepare("INSERT INTO `teams` (`name`,`sport`,`country`,`photo`, `team_color`, `desc`)
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