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
        $curlConnection = curl_init();
        $this->curlConnection = $curlConnection;
    }

    /**
     * Retrieves API data and returns json
     *
     * @return array|mixed
     */
    public function getJson($curlConnection)
    {
        curl_setopt($curlConnection, CURLOPT_URL, 'https://dev.maydenacademy.co.uk/resources/sports_teams/sports.json');
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($curlConnection);
        $json = json_decode($apiData, true);
        return $json;
    }


    /**
     * Closes curl connection when no longer required
     */
    public function __destruct()
    {
        $curlConnection = $this->curlConnection;
        curl_close($curlConnection);
    }
}