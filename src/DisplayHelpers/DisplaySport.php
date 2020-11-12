<?php

namespace TheRealMVP\DisplayHelpers;

class DisplaySport
{
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param  mixed $data
     *
     * @return string
     */
    public static function displayAllSport(array $data) : string
    {
        $sportString = '';
        foreach($data as $sport){
            $sportString .= '<option value="'
            . $sport->getId()
                . '">'
            . $sport->getName()
                . '</option>';
        }
        return $sportString;
    }
}