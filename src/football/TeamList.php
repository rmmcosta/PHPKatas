<?php

namespace subclasses\football;

use AllowDynamicProperties;

/**
 * @property Team[] $teamList
 */
#[AllowDynamicProperties] class TeamList
{

    public function __construct(Team ...$teams)
    {
        $this->teamList = $teams;
    }

    public function all(): array
    {
        return $this->teamList;
    }

    public function add(Team $team): void
    {
        $this->teamList[] = $team;
    }
}