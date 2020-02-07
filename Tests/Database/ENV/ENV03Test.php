<?php

namespace AideTravaux\MaPrimeRenov\Tests\ENV\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\ENV\ENV03;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class ENV03Test extends TestCase
{
    /**
     * @dataProvider modelMontantProvider
     */
    public function testGetMontant($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV03::getMontant($stub), $expect);
    }

    /**
     * @dataProvider modelMontantForfaitaireProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV03::getMontantForfaitaire($stub), $expect);
    }

    /**
     * @dataProvider modelPlafondProvider
     */
    public function testGetPlafond($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV03::getPlafond($stub), $expect);
    }

    public function testGetPlafondForfaitaire()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertEquals(ENV03::getPlafondForfaitaire($stub), 75);
    }

    public function getMock(array $model)
    {
        $stub = $this->createMock(DataInterface::class);

        foreach ($model as $method => $value) {
            $stub->method($method)->willReturn($value);
        }
        return $stub;
    }

    public function modelMontantProvider()
    {
        return [
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1'],
                'getSurfaceIsolant' => (float) 100
            ], 20 * 100],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getSurfaceIsolant' => (float) 100,
                'getQuotePart' => (float) 0.5
            ], 20 * 100 * 0.5],
            [ 'model' => [], 0]
        ];
    }

    public function modelMontantForfaitaireProvider()
    {
        return [
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 20],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 20],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => ''
            ], 0],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 25],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 25],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => ''
            ], 0],
            [ 'model' => [], 0]
        ];
    }

    public function modelPlafondProvider()
    {
        return [
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1'],
                'getSurfaceIsolant' => (float) 100
            ], 75 * 100],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getSurfaceIsolant' => (float) 100,
                'getQuotePart' => (float) 0.5
            ], 75 * 100 * 0.5],
            [ 'model' => [], 0]
        ];
    }

}
