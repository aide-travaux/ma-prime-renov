<?php

namespace AideTravaux\MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Model\DataInterface;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;
use AideTravaux\MaPrimeRenov\Utils\DataFormater;

class DataFormaterTest extends TestCase
{
    public function testGet()
    {
        $this->assertTrue(\is_array(DataFormater::get()));
    }
}
