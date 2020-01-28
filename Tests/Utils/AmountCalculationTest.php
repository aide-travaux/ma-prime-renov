<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Model\ProjectInterface;
use MaPrimeRenov\Utils\AmountCalculation;

class AmountCalculationTest extends TestCase
{
    /**
     * @dataProvider unitProvider
     */
    public function testGet($unit = null)
    {
        $mockProject = $this->createMock(ProjectInterface::class);
        $mockProject->method('getHousingNumber')->willReturn(1);
        $mockProject->method('getInsulationArea')->willReturn((float) 1);
        $mockProject->method('getExpenseShare')->willReturn((float) 1);
        $mockProject->method('getEquipmentNumber')->willReturn(1);

        $this->assertTrue(\is_float(AmountCalculation::get(
            100, $unit, $mockProject
        )));
    }

    public function unitProvider()
    {
        return [
            ['logement'],
            ['m²'],
            ['equipement'],
            [null]
        ];
    }
}
