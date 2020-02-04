<?php

namespace AideTravaux\MaPrimeRenov\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\MaPrimeRenov;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class MaPrimeRenovTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testGet($model)
    {
        $value = MaPrimeRenov::get($model);
        $this->assertTrue(\is_null($value) || \is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetBareme($model)
    {
        $value = MaPrimeRenov::getBareme($model);
        $this->assertTrue(\is_null($value) || \is_array($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetPlafondDepensesEligibles($model)
    {
        $value = MaPrimeRenov::getPlafondDepensesEligibles($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetPlafondCouverture($model)
    {
        $value = MaPrimeRenov::getPlafondCouverture($model);
        $this->assertTrue(\is_float($value));
    }

    public function testGetPlafond()
    {
        $this->assertTrue(\is_int(MaPrimeRenov::getPlafond()));
    }

    public function testToArray()
    {
        $this->assertTrue(\is_array(MaPrimeRenov::toArray()));
    }

    public function modelProvider()
    {
        $stub = $this->createMock(DataInterface::class);

        $stub->method('getMaPrimeRenovCodeTravaux')->willReturn('MPR-ENV-01');
        $stub->method('getCategorieAnah')->willReturn(Entries::CATEGORIES_ANAH['cateogrie_anah_1']);
        $stub->method('getTypePartie')->willReturn(Entries::TYPE_PARTIES['type_partie_1']);
        $stub->method('getSurfaceIsolant')->willReturn((float) 10);
        $stub->method('getQuotePart')->willReturn((float) 1);
        $stub->method('getNombreLogements')->willReturn(1);
        $stub->method('getNombreEquipement')->willReturn(1);
        $stub->method('getCoutTTC')->willReturn((float) 1);        

        return [ [ $stub ] ];
    }
}
