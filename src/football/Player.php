<?php

namespace subclasses\football;

class Player
{
    private readonly string $name;
    private Team $currentTeam;
    private array $previousTeams;
    private ?int $shirtNumber = null;

    /**
     * @param string $name
     * @param Team $currentTeam
     */
    public function __construct(string $name, Team $currentTeam)
    {
        $this->name = $name;
        $this->currentTeam = $currentTeam;
    }

    public function changeTeam(Team $team):void
    {
        $this->previousTeams[] = $this->currentTeam;
        $this->currentTeam = $team;
    }

    /**
     * @return Team
     */
    public function getCurrentTeam(): Team
    {
        return $this->currentTeam;
    }

    /**
     * @return array
     */
    public function getPreviousTeams(): array
    {
        return $this->previousTeams;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|string
     */
    public function getShirtNumber(): int|string
    {
        if (is_null($this->shirtNumber)) {
            return "Not defined";
        }
        return $this->shirtNumber;
    }

    /**
     * @param int $shirtNumber
     */
    public function setShirtNumber(int $shirtNumber): void
    {
        $this->shirtNumber = $shirtNumber;
    }


}