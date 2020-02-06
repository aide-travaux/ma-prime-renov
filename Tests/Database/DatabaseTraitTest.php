<?php

namespace AideTravaux\MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Database\Database;
use AideTravaux\MaPrimeRenov\Database\DatabaseTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class DatabaseTraitTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testClassInterface($class)
    {
        $this->assertTrue(\in_array(DatabaseTrait::class, \class_uses($class)));
    }

    /**
     * @depends testClassInterface
     * @dataProvider classProvider
     */
    public function testMethod($class)
    {
        $stub = $this->createMock(DataInterface::class);

        $this->assertArrayHasKey('nom', $class::toArray($stub));
        $this->assertArrayHasKey('code', $class::toArray($stub));
        $this->assertArrayHasKey('montant', $class::toArray($stub));
        $this->assertArrayHasKey('montant_forfaitaire', $class::toArray($stub));
        $this->assertArrayHasKey('plafond', $class::toArray($stub));
        $this->assertArrayHasKey('plafond_forfaitaire', $class::toArray($stub));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}