<?php

namespace subclasses\football;

class Team
{
    private readonly Country $country;
    private int $numberOfAssociates;
    private string $stadiumName;
    private array $playerList;

    /**
     * @param Country $country
     * @param int $numberOfAssociates
     * @param string $stadiumName
     */
    public function __construct(Country $country, int $numberOfAssociates, string $stadiumName)
    {
        $this->country = $country;
        $this->numberOfAssociates = $numberOfAssociates;
        $this->stadiumName = $stadiumName;
        $this->playerList = [];
    }

    /**
     * @return string
     */
    public function getStadiumName(): string
    {
        return $this->stadiumName;
    }

    /**
     * @param string $stadiumName
     */
    public function setStadiumName(string $stadiumName): void
    {
        $this->stadiumName = $stadiumName;
    }

    /**
     * @return int
     */
    public function getNumberOfAssociates(): int
    {
        return $this->numberOfAssociates;
    }

    /**
     * @param int $numberOfAssociates
     */
    public function setNumberOfAssociates(int $numberOfAssociates): void
    {
        $this->numberOfAssociates = $numberOfAssociates;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function getPlayerList(): array
    {
        return $this->playerList;
    }

    /**
     * @param Player $player
     */
    public function addPlayer(Player $player): void
    {
        $this->playerList[] = $player;
    }


}