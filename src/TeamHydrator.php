<?php


namespace TheRealMVP;


class TeamHydrator {
    public static function getTeam($name, $photo, $sport, $country, $team_color, $desc)
    {
        return new Team($name, $photo, $sport, $country, $team_color, $desc);
    }
}