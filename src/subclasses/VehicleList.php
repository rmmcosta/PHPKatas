<?php

namespace subclasses\subclasses;

use AllowDynamicProperties;

/**
 * @property Vehicle[] $vehicleList
 */
#[AllowDynamicProperties] class VehicleList
{
    public function __construct(Vehicle  ...$vehicle)
    {
        $this->vehicleList = $vehicle;
    }

    public function add(Vehicle $vehicle): void
    {
        $this->vehicleList[] = $vehicle;
    }

    public function all(): array
    {
        return $this->vehicleList;
    }
}