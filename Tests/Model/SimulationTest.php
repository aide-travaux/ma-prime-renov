<?php

namespace MaPrimeRenov\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\Model\SimulationInterface;
use AideTravaux\Model\SimulationTrait;
use MaPrimeRenov\Model\Aid;
use MaPrimeRenov\Model\Simulation;

class SimulationTest extends TestCase
{
    public function testClassExtends()
    {
        $this->assertTrue(\in_array(Aid::class, \class_parents(Simulation::class)));
    }

    public function testClassInterface()
    {
        $this->assertTrue(\in_array(SimulationInterface::class, \class_implements(Simulation::class)));
    }

    public function testClassTrait()
    {
        $this->assertTrue(\in_array(SimulationTrait::class, \class_uses(Simulation::class)));
    }
 
}
