<?php

require_once '../src/DisplayData.php';
require_once '../src/Team.php';

use PHPUnit\Framework\TestCase;

class DisplayDataTest extends TestCase
{
    public function testDisplayDataSuccess()
    {
        $TeamMock = $this->createMock(\TheRealMVP\Team::class);
        $TeamMock->expects($this->once())
            ->method('getId')
            ->willReturn(1);
        $TeamMock->expects($this->any())
            ->method('getName')
            ->willReturn('Manchester United');
        $TeamMock->expects($this->once())
            ->method('getPhoto')
            ->willReturn('https://dev.maydenacademy.co.uk/resources/sports_teams/man_utd.png');
        $TeamMock->expects($this->once())
            ->method('getSport')
            ->willReturn('Football');
        $TeamMock->expects($this->once())
            ->method('getCountry')
            ->willReturn('United Kingdom');
        $TeamMock->expects($this->once())
            ->method('getTeamColor')
            ->willReturn('Red/Yellow');

        $DisplayData = new \TheRealMVP\DisplayData();
        $result = $DisplayData->displayAllTeams([$TeamMock]);
        $expected = '<a href="detail.php?team=1"><section role="button" tabindex="1"><h2 tabindex="1">Manchester United</h2><div class="content"><img tabindex="1" alt="Team logo for Manchester United" src="https://dev.maydenacademy.co.uk/resources/sports_teams/man_utd.png"/><ul tabindex="1"><li >Sport: Football</li><li>Country: United Kingdom</li><li>Team Colours: Red/Yellow</li></ul></div></section></a>';
        $this->assertEquals($expected, $result);
    }

    public function testDisplayDataFailure()
    {
        $DisplayData = new \TheRealMVP\DisplayData();
        $this->expectException(TypeError::class);
        $result = $DisplayData->displayAllTeams('hello');
    }
}
