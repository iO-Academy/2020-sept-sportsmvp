<?php

namespace TheRealMVP;

class Team 
{
    protected int $id;
    protected string $name;
    protected string $photo;
    protected string $sport;
    protected string $country;
    protected string $team_color;
    protected string $desc;
    protected string $sportId;
    protected string $countryId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @return string
     */
    public function getSport(): string
    {
        return $this->sport;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getTeamColor(): string
    {
        return $this->team_color;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getSportId(): string
    {
        return $this->sportId;
    }

    /**
     * @return string
     */
    public function getCountryId(): string
    {
        return $this->countryId;
    }
}