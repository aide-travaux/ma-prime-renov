<?php

namespace AideTravaux\MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Database\Database;
use AideTravaux\MaPrimeRenov\Database\DatabaseInterface;

class DatabaseInterfaceTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testClassInterface($class)
    {
        $this->assertTrue(\in_array(DatabaseInterface::class, \class_implements($class)));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}
