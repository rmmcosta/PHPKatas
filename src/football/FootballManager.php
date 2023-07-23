<?php

namespace subclasses\football;

class FootballManager
{
    private ?array $footballTeamsPerCountry;

    /**
     */
    public function __construct()
    {
        $this->footballTeamsPerCountry = [];
    }


    public function addTeam(Team $team): void
    {
        $countryName = $team->getCountry()->name;
        if (!empty($this->footballTeamsPerCountry[$countryName])) {
            $currentCountryTeams = $this->footballTeamsPerCountry[$countryName];
            $currentCountryTeams->add($team);
            $this->footballTeamsPerCountry[$countryName] = $currentCountryTeams;
        } else {
            $this->footballTeamsPerCountry[$countryName] = new TeamList($team);
        }
    }

    /**
     * @return array|null
     */
    public function getAllFootballTeamsPerCountry(): array|null
    {
        return $this->footballTeamsPerCountry;
    }

    /**
     * @param Country $country
     * @return array|null
     */
    public function getFootballTeamsPerCountry(Country $country): array|null
    {
        if (is_null($this->footballTeamsPerCountry[$country->name])) {
            return null;
        }
        return $this->footballTeamsPerCountry[$country->name]->all();
    }
}