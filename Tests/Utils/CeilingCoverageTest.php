<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use MaPrimeRenov\Utils\CeilingCoverage;

class CeilingCoverageTest extends TestCase
{
    /**
     * @dataProvider anahCategoryProvider
     */
    public function testGet($anahCategory)
    {
        $mockProfile = $this->createMock(ProfileInterface::class);
        $mockProfile->method('getAnahCategory')->willReturn($anahCategory);
    
        $mockProject = $this->createMock(ProjectInterface::class);
        $mockProject->method('getMaPrimeRenovWorkCode')->willReturn('ENV-01');
        $mockProject->method('getBuildingArea')->willReturn('Partie privative');
        $mockProject->method('getCostIncludingVAT')->willReturn((float) 100);
        $mockProject->method('getHousingNumber')->willReturn(1);
        $mockProject->method('getInsulationArea')->willReturn((float) 1);
        $mockProject->method('getExpenseShare')->willReturn((float) 1);
        $mockProject->method('getEquipmentNumber')->willReturn(1);

        $this->assertTrue(\is_float(CeilingCoverage::get(
            $mockProfile, $mockProject
        )));
    }

    public function anahCategoryProvider()
    {
        return [
            ['Modeste'],
            ['Très modeste'],
            ['']
        ];
    }
}
