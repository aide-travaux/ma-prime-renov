<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use MaPrimeRenov\Utils\CeilingExpense;

class CeilingExpenseTest extends TestCase
{
    /**
     * @dataProvider mockProvider
     */
    public function testSuccess($mockProfile, $mockProject)
    {
        $mockProject->method('getMaPrimeRenovWorkCode')->willReturn('ENV-01');

        $this->assertTrue(\is_float(CeilingExpense::get($mockProfile, $mockProject)));
        $this->assertGreaterThan(0, CeilingExpense::get($mockProfile, $mockProject));
    }

    /**
     * @dataProvider mockProvider
     */
    public function testFailure($mockProfile, $mockProject)
    {
        $mockProject->method('getMaPrimeRenovWorkCode')->willReturn('null');
    
        $this->assertTrue(\is_float(CeilingExpense::get($mockProfile, $mockProject)));
        $this->assertEquals(CeilingExpense::get($mockProfile, $mockProject), 0);
    }

    public function mockProvider()
    {
        $mockProfile = $this->createMock(ProfileInterface::class);
        $mockProfile->method('getAnahCategory')->willReturn('Modeste');
    
        $mockProject = $this->createMock(ProjectInterface::class);
        $mockProject->method('getBuildingArea')->willReturn('Partie privative');
        $mockProject->method('getCostIncludingVAT')->willReturn((float) 100);
        $mockProject->method('getHousingNumber')->willReturn(1);
        $mockProject->method('getInsulationArea')->willReturn((float) 1);
        $mockProject->method('getExpenseShare')->willReturn((float) 1);
        $mockProject->method('getEquipmentNumber')->willReturn(1);

        return [
            [$mockProfile, $mockProject]
        ];
    }
}
