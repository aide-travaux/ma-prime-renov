<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Utils\Condition;
use MaPrimeRenov\Utils\Conditions;

class ConditionsTest extends TestCase
{
    public function testType()
    {
        $conditions = Conditions::get();

        $this->assertTrue(\is_array($conditions));

        return $conditions;
    }

    /**
     * @depends testType
     */
    public function testCondition(array $conditions)
    {
        foreach ($conditions as $condition) {
            $this->assertInstanceOf(Condition::class, $condition);
        }
    }
}
