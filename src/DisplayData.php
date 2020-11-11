<?php

namespace TheRealMVP;

class DisplayData
{    
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param  mixed $data
     * 
     * @return void
     */
    public function displayAllTeams(array $data) : void
    {
       foreach($data as $team){
         echo '<a href="detail.php?team='
         . $team->id
         . '"><section role="button" tabindex="1"><h2 tabindex="1">' 
         . $team->name 
         . '</h2><div class="content"><img tabindex="1" alt="Team logo for '
         . $team->name
         . '" src="'
         . $team->photo
         . '"/><ul tabindex="1"><li >Sport: '
         . $team->sport 
         . '</li><li>Country: '
         . $team->country
         . '</li><li>Team Colours: '
         . $team->team_color
         . '</li></ul></div></section></a>';      
       }
    }
}
