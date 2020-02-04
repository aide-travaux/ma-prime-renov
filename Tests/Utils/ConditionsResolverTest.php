<?php

namespace AideTravaux\MaPrimeRenov\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;
use AideTravaux\MaPrimeRenov\Utils\ConditionsResolver;

class ConditionsResolverTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testResolveConditions($model)
    {
        $this->assertTrue(\is_array(ConditionsResolver::resolveConditions($model)));
    }

    /**
     * @depends testResolveConditions
     * @dataProvider modelProvider
     */
    public function testResolveConditionsStructure($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertArrayHasKey('condition', $condition);
            $this->assertArrayHasKey('value', $condition);
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testResolveConditionsType($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertTrue(\is_string($condition['condition']));
            $this->assertTrue(\is_null($condition['value']) || \is_bool($condition['value']));
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testIsEligible($model)
    {
        $this->assertTrue(\is_bool(ConditionsResolver::isEligible($model)));
    }

    public function modelProvider()
    {
        $stub = $this->createMock(ConditionInterface::class);

        $stub->method('getMaPrimeRenovCodeTravaux')->willReturn('MPR-ENV-01');
        $stub->method('getCategorieAnah')->willReturn(Entries::CATEGORIES_ANAH['cateogrie_anah_1']);
        $stub->method('getTypeLogement')->willReturn(Entries::TYPES_LOGEMENT['type_logement_1']);
        $stub->method('getStatutOccupantLogement')
            ->willReturn(Entries::STATUTS_OCCUPANT_LOGEMENT['statut_occupant_logement_1']);
        $stub->method('getTypeOccupationLogement')
            ->willReturn(Entries::TYPES_OCCUPATION_LOGEMENT['type_occupation_logement_1']);
        $stub->method('getAgeLogement')->willReturn(10);

        return [ [ $stub ] ];
    }
}
