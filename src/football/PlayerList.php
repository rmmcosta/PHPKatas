<?php

namespace subclasses\football;


use AllowDynamicProperties;

/**
 * @property Player[] $playerList
 */
#[AllowDynamicProperties] class PlayerList
{

    public function __construct(Player ...$players)
    {
        $this->playerList = $players;
    }

    public function all(): array
    {
        return $this->playerList;
    }

    public function add(Player $player): void
    {
        $this->playerList[] = $player;
    }
}