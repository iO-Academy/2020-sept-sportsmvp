<?php

//require_once '../vendor/autoload.php';
require_once 'dbConn.php';
require_once 'dbGetData.php';



class Team {
    public $name;
    public $photo;
    public $sport;
    public $country;
    public $team_color;
    public $desc;

    public function __construct(string $name, $photo, $sport, $country, $team_color, $desc)
    {
        $this->name = $name;
        $this->photo = $photo;
        $this->sport = $sport;
        $this->country = $country;
        $this->team_color = $team_color;
        $this->desc = $desc;
    }
}

class TeamHydrator {
    public static function getTeam($name, $photo, $sport, $country, $team_color, $desc)
    {
        return new Team($name, $photo, $sport, $country, $team_color, $desc);
    }
}


function displayTeams($data) {
    foreach($data as $displayTeam) {
        echo "<div>"
        . "<p>" . $displayTeam['name'] . "</p>"
        . "<p>" . $displayTeam['photo'] . "</p>"
        . "<p>" . $displayTeam['sport'] . "</p>"
        . "<p>" . $displayTeam['country'] . "</p>"
        . "<p>" . $displayTeam['team_color'] . "</p>"
        . "<p>" . $displayTeam['desc'] . "</p>" . "</div>";
    }
}
displayTeams($data);