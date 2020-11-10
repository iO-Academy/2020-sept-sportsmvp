<?php


namespace TheRealMVP;


class DisplayData{
    public static function displayTeams($data)
    {
        foreach ($data as $displayTeam) {
            echo "<div>"
                . "<p>" . $displayTeam['name'] . "</p>"
                . "<p>" . $displayTeam['photo'] . "</p>"
                . "<p>" . $displayTeam['sport'] . "</p>"
                . "<p>" . $displayTeam['country'] . "</p>"
                . "<p>" . $displayTeam['team_color'] . "</p>"
                . "<p>" . $displayTeam['desc'] . "</p>" . "</div>";
        }
    }
}