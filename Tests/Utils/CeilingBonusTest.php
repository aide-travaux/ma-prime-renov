<?php

namespace MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use MaPrimeRenov\Utils\CeilingBonus;

class CeilingBonusTest extends TestCase
{
    public function testGet()
    {
        $this->assertEquals(CeilingBonus::get(), 20000);
    }
}
