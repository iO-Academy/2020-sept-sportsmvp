<?php

namespace TheRealMVP;

class GetAPI
{
    private array $json;
    public function __construct()
    {
        $curlConnection = curl_init();
        curl_setopt($curlConnection, CURLOPT_URL, 'https://dev.maydenacademy.co.uk/resources/sports_teams/sports.json');
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($curlConnection);
        curl_close($curlConnection);
        $this->json = json_decode($apiData, true);
    }

    /**
     * Getter method - able to access the json data outside
     *
     * @return array|mixed
     */
    public function getJson()
    {
        return $this->json;
    }
}