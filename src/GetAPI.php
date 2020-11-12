<?php

namespace TheRealMVP;

class GetAPI
{
    public $curlConnection;

    /**
     * GetAPI constructor - initialises curl connection
     */
    public function __construct()
    {
        $this->curlConnection = curl_init();
    }

    /**
     * Retrieves API data and returns json array
     */
    public function getJson()
    {
        curl_setopt($this->curlConnection, CURLOPT_URL, 'https://dev.maydenacademy.co.uk/resources/sports_teams/sports.json');
        curl_setopt($this->curlConnection, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($this->curlConnection);
        return json_decode($apiData, true);
    }


    /**
     * Closes curl connection when no longer required
     */
    public function __destruct()
    {
        curl_close($this->curlConnection);
    }
}