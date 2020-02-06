<?php

namespace AideTravaux\MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Database\Database;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

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

    /**
     * @depend testClassInterface
     * @dataProvider classProvider
     */
    public function testClassMethods($class)
    {
        $stub = $this->createMock(DataInterface::class);

        $stub->method('getMaPrimeRenovCodeTravaux')->willReturn('');
        $stub->method('getCategorieAnah')->willReturn('');
        $stub->method('getTypePartie')->willReturn('');
        $stub->method('getSurfaceIsolant')->willReturn((float) 0);
        $stub->method('getSurfaceProtegee')->willReturn((float) 0);
        $stub->method('getQuotePart')->willReturn((float) 0);
        $stub->method('getNombreLogements')->willReturn(0);
        $stub->method('getNombreEquipement')->willReturn(0);
        $stub->method('getCoutTTC')->willReturn((float) 0);

        $this->assertTrue(\is_float($class::getMontant($stub)));
        $this->assertTrue(\is_float($class::getPlafond($stub)));
        $this->assertTrue(\is_int($class::getMontantForfaitaire($stub)));
        $this->assertTrue(\is_int($class::getMontantForfaitaire($stub)));
        $this->assertTrue(\is_array($class::toArray($stub)));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}
