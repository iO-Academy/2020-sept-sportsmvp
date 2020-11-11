<?php

namespace TheRealMVP;


class GetAPI
{
    public function __construct()
    {
        $curlConnection = curl_init();
        curl_setopt($curlConnection, CURLOPT_URL, 'https://dev.maydenacademy.co.uk/resources/sports_teams/sports.json');
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);
        $apiData = curl_exec($curlConnection);
        curl_close($curlConnection);
        $json = json_decode($apiData, true);
    }
}