<?php


namespace TheRealMVP;


class Team {
    public $name;
    public $photo;
    public $sport;
    public $country;
    public $team_color;
    public $desc;

    public function __construct($data)
    {
        $this->name = $name;
        $this->photo = $photo;
        $this->sport = $sport;
        $this->country = $country;
        $this->team_color = $team_color;
        $this->desc = $desc;
    }
}