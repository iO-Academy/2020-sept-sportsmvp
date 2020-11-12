<?php

namespace TheRealMVP\Importers;

class GetAPI
{
    private $curlConnection;
    /**
     * GetAPI constructor.
     */
    public function __construct()
    {
        $this->curlConnection = curl_init();
    }


    /**
     * Accesses API and returns array of objects
     *
     * @return array
     */
    public function getJson(): array
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