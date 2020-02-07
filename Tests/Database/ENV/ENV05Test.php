<?php

namespace AideTravaux\MaPrimeRenov\Tests\ENV\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\ENV\ENV05;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class ENV05Test extends TestCase
{
    /**
     * @dataProvider modelMontantProvider
     */
    public function testGetMontant($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV05::getMontant($stub), $expect);
    }

    /**
     * @dataProvider modelMontantForfaitaireProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV05::getMontantForfaitaire($stub), $expect);
    }

    /**
     * @dataProvider modelPlafondProvider
     */
    public function testGetPlafond($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV05::getPlafond($stub), $expect);
    }

    /**
     * @dataProvider modelPlafondForfaitaireProvider
     */
    public function testGetPlafondForfaitaire($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(ENV05::getPlafondForfaitaire($stub), $expect);
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
                'getNombreFenetres' => 10
            ], 80 * 10],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getNombreFenetres' => 10,
                'getQuotePart' => (float) 0.5
            ], 0 * 10 * 0.5],
            [ 'model' => [], 0]
        ];
    }

    public function modelMontantForfaitaireProvider()
    {
        return [
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 80],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 0],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => ''
            ], 0],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 100],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 0],
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
                'getNombreFenetres' => 10
            ], 1000 * 10],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getNombreFenetres' => 10,
                'getQuotePart' => (float) 0.5
            ], 0 * 10 * 0.5],
            [ 'model' => [], 0]
        ];
    }

    public function modelPlafondForfaitaireProvider()
    {
        return [
            [ 'model' => [
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 1000],
            [ 'model' => [
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 0],
            [ 'model' => [], 0]
        ];
    }

}
