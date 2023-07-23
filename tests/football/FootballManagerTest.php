<?php

namespace football;

use subclasses\football\Country;
use subclasses\football\FootballManager;
use PHPUnit\Framework\TestCase;
use subclasses\football\Player;
use subclasses\football\Team;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEmpty;
use function PHPUnit\Framework\assertEquals;

class FootballManagerTest extends TestCase
{
    private FootballManager $footballManager;

    protected function setUp(): void
    {
        $this->footballManager = new FootballManager();
    }

    public function testShouldReturnCorrectPlayersPerTeam()
    {
        $benfica = new Team(Country::Portugal, 6000000, "Estádio da Luz");
        assertEmpty($benfica->getPlayerList());
        $player1 = new Player("Di Maria", $benfica);
        $benfica->addPlayer($player1);
        $benficaPlayers = $benfica->getPlayerList();
        assertCount(1, $benficaPlayers);
        assertEquals($player1, $benficaPlayers[0]);
    }

    public function testShouldReturnCorrectTeamsPerCountry()
    {
        assertEmpty($this->footballManager->getFootballTeamsPerCountry(Country::Portugal));
        $benfica = new Team(Country::Portugal, 6000000, "Estádio da Luz");
        $this->footballManager->addTeam($benfica);
        $portugalTeams = $this->footballManager->getFootballTeamsPerCountry(Country::Portugal);
        assertCount(1, $portugalTeams);
        assertEquals($benfica, $portugalTeams[0]);
    }
}
