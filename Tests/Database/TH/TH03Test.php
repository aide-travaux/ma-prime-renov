<?php

namespace AideTravaux\MaPrimeRenov\Tests\TH\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\TH\TH03;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class TH03Test extends TestCase
{
    /**
     * @dataProvider modelMontantProvider
     */
    public function testGetMontant($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(TH03::getMontant($stub), $expect);
    }

    /**
     * @dataProvider modelMontantForfaitaireProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(TH03::getMontantForfaitaire($stub), $expect);
    }

    /**
     * @dataProvider modelPlafondProvider
     */
    public function testGetPlafond($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(TH03::getPlafond($stub), $expect);
    }

    /**
     * @dataProvider modelPlafondForfaitaireProvider
     */
    public function testGetPlafondForfaitaire($model, $expect)
    {
        $stub = $this->getMock($model);
        $this->assertEquals(TH03::getPlafondForfaitaire($stub), $expect);
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
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 6500],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getNombreLogements' => 10
            ], 2000 * 10 ],
            [ 'model' => [], 0]
        ];
    }

    public function modelMontantForfaitaireProvider()
    {
        return [
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 6500],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 2000],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => ''
            ], 0],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 8000],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_2'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 3000],
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
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 16000],
            [ 'model' => [
                'getCategorieAnah' => Entries::CATEGORIES_ANAH['cateogrie_anah_1'],
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2'],
                'getNombreLogements' => 10
            ], 18000 * 10],
            [ 'model' => [], 0]
        ];
    }

    public function modelPlafondForfaitaireProvider()
    {
        return [
            [ 'model' => [
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
            ], 16000],
            [ 'model' => [
                'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
            ], 18000],
            [ 'model' => [], 0]
        ];
    }

}
