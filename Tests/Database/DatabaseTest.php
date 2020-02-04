<?php

namespace AideTravaux\MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Database\Database;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;

class DatabaseTest extends TestCase
{
    public function testType()
    {
        $this->assertTrue(\is_array(Database::DB));
    }

    /**
     * @dataProvider classProvider
     */
    public function testClass($class)
    {
        $this->assertTrue(\class_exists($class));
    }

    /**
     * @dataProvider classProvider
     */
    public function testClassInterface($class)
    {
        $this->assertTrue(\in_array(DBInterface::class, \class_implements($class)));
    }

    /**
     * @dataProvider classProvider
     */
    public function testClassTrait($class)
    {
        $this->assertTrue(\in_array(DBTrait::class, \class_uses($class)));
    }

    /**
     * @dataProvider classProvider
     */
    public function testClassConstant($class)
    {
        $reflect = new \ReflectionClass($class);
        $constants = $reflect->getConstants();

        $this->assertNotFalse($reflect->getConstant('NOM'));
        $this->assertNotFalse($reflect->getConstant('CODE'));
    }

    /**
     * @depend testClassConstant
     * @dataProvider classProvider
     */
    public function testClassConstantType($class)
    {
        $this->assertTrue(\is_string($class::NOM));
        $this->assertTrue(\is_string($class::CODE));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}
