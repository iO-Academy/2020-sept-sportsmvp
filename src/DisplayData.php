<?php

namespace TheRealMVP;

class DisplayData
{    
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param  mixed $data
     * 
     * @return string
     */
    public function displayAllTeams(array $data) : string
    {
        $teamString = '';
        foreach($data as $team){
         $teamString .= '<a href="detail.php?team='
         . $team->getId()
         . '"><section role="button" tabindex="1"><h2 tabindex="1">'
         . $team->getName()
         . '</h2><div class="content"><img tabindex="1" alt="Team logo for '
         . $team->getName()
         . '" src="'
         . $team->getPhoto()
         . '"/><ul tabindex="1"><li >Sport: '
         . $team->getSport()
         . '</li><li>Country: '
         . $team->getCountry()
         . '</li><li>Team Colours: '
         . $team->getTeamColor()
         . '</li></ul></div></section></a>';
       }
        return $teamString;
    }
}