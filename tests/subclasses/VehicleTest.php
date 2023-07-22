<?php

namespace subclasses;

use PHPUnit\Framework\TestCase;
use subclasses\subclasses\Car;
use subclasses\subclasses\GenericVehicle;
use subclasses\subclasses\Moto;
use subclasses\subclasses\VehicleList;
use function PHPUnit\Framework\assertEquals;

class VehicleTest extends TestCase
{
    public function testShouldTurnCustomEngineAccordingToSpecificType(): void
    {
        $vehicleList = new VehicleList(new Car(), new Moto(), new GenericVehicle());
        foreach ($vehicleList->all() as $vehicle) {
            $msg = $vehicle->turnEngine();
            $expectedMsg = "";
            if ($vehicle instanceof Car) {
                $expectedMsg = "Car engine turned on";
            }
            if ($vehicle instanceof Moto) {
                $expectedMsg = "Moto engine turned on";
            }
            if ($vehicle instanceof GenericVehicle) {
                $expectedMsg = "Vehicle engine turned on";
            }
            assertEquals($expectedMsg, $msg);
        }
    }
}
