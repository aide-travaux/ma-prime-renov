<?php

namespace AideTravaux\MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Database\ENV\ENV04;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

class ENV04Test extends TestCase
{
    public function getDefaultMock()
    {
        $stub = $this->createMock(DataInterface::class);

        $stub->method('getMaPrimeRenovCodeTravaux')->willReturn('');
        $stub->method('getSurfaceIsolant')->willReturn((float) 0);
        $stub->method('getSurfaceProtegee')->willReturn((float) 0);
        $stub->method('getQuotePart')->willReturn((float) 0);
        $stub->method('getNombreLogements')->willReturn(0);
        $stub->method('getNombreEquipement')->willReturn(0);
        $stub->method('getCoutTTC')->willReturn((float) 0);

        return $stub;
    }

    /**
     * @dataProvider mockProvider
     */
    public function testMethods($model)
    {
        $stub = $this->getDefaultMock();

        foreach ($model as $key => $value) {
            $stub->method($key)->willReturn($value);
        }

        $this->assertTrue(\is_float(ENV04::getMontant($stub)));
        $this->assertTrue(\is_float(ENV04::getPlafond($stub)));
        $this->assertTrue(\is_int(ENV04::getMontantForfaitaire($stub)));
        $this->assertTrue(\is_int(ENV04::getMontantForfaitaire($stub)));
        $this->assertTrue(\is_array(ENV04::toArray($stub)));
    }

    public function mockProvider()
    {
        return [
            [
                'model' => [
                    'getCategorieAnah' => 'Modeste',
                    'getTypePartie' => 'Partie privative'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => 'Modeste',
                    'getTypePartie' => 'Partie commune'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => 'Très modeste',
                    'getTypePartie' => 'Partie privative'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => 'Très modeste',
                    'getTypePartie' => 'Partie commune'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => 'Modeste',
                    'getTypePartie' => ''
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => '',
                    'getTypePartie' => 'Partie privative'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => 'Très modeste',
                    'getTypePartie' => ''
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => '',
                    'getTypePartie' => 'Partie commune'
                ]
            ], [
                'model' => [
                    'getCategorieAnah' => '',
                    'getTypePartie' => ''
                ]
            ]
        ];
    }
}
