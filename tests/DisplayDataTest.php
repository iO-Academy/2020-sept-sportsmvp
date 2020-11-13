<?php

require_once '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use TheRealMVP\Entities\Team;
use TheRealMVP\DisplayHelpers\DisplayData;

class DisplayDataTest extends TestCase
{
    public function testDisplayDataSuccess()
    {
        $TeamMock = $this->createMock(Team::class);
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

        $result = DisplayData::displayAllTeams([$TeamMock]);
        $expected = '<a tabindex="1" class="all" href="detail.php?team=1"><section role="button" tabindex="1"><h2 tabindex="1">Manchester United</h2><div class="content"><img tabindex="1" alt="Team logo for Manchester United" src="https://dev.maydenacademy.co.uk/resources/sports_teams/man_utd.png"/><ul tabindex="1"><li >Sport: Football</li><li>Country: United Kingdom</li><li>Team Colours: Red/Yellow</li></ul></div></section></a>';
        $this->assertEquals($expected, $result);
    }

    public function testDisplayDataFailure()
    {
        $this->expectException(TypeError::class);
        $result = DisplayData::displayAllTeams('hello');
    }

    public function testDisplayDataSingleTeamSuccess()
    {
        $TeamMock = $this->createMock(Team::class);
        $TeamMock->expects($this->once())
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
        $TeamMock->expects($this->once())
            ->method('getDesc')
            ->willReturn('Manchester United Football Club is a professional football club based in Old Trafford, Greater Manchester, England, that competes in the Premier League, the top flight of English football.');

        $result = DisplayData::displayOneTeam($TeamMock);
        $expected = '<section><h2 tabindex="3">Manchester United</h2><div class="content"><img tabindex="4" src="https://dev.maydenacademy.co.uk/resources/sports_teams/man_utd.png" /><ul tabindex="5"><li>Sport: Football</li><li>Country: United Kingdom</li><li>Colours: Red/Yellow</li></ul></div><p tabindex="6">Manchester United Football Club is a professional football club based in Old Trafford, Greater Manchester, England, that competes in the Premier League, the top flight of English football.</p></section>';
        $this->assertEquals($expected, $result);
    }

    public function testDisplayDataSingleTeamFailure()
    {
        $this->expectException(TypeError::class);
        $result = DisplayData::displayOneTeam('hello');
    }
}
