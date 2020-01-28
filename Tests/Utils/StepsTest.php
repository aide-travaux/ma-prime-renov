<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Utils\Step;
use MaPrimeRenov\Utils\Steps;

class StepsTest extends TestCase
{
    public function testType()
    {
        $steps = Steps::get();

        $this->assertTrue(\is_array($steps));

        return $steps;
    }

    /**
     * @depends testType
     */
    public function testStep(array $steps)
    {
        foreach ($steps as $steps) {
            $this->assertInstanceOf(Step::class, $steps);
        }
    }
}
