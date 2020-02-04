<?php

namespace AideTravaux\MaPrimeRenov\Utils;

use AideTravaux\MaPrimeRenov\MaPrimeRenov;
use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;
use AideTravaux\MaPrimeRenov\Repository\Repository;

abstract class ConditionsResolver
{
    /**
     * Retourne les conditions d'accès satisfaites ou non
     * @param ConditionInterface
     * @return array
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        $conditions = MaPrimeRenov::CONDITIONS;

        return [
            [
                'condition' => $conditions[0],
                'value' => \in_array( $model->getCategorieAnah(), Entries::CATEGORIES_ANAH )
            ], [
                'condition' => $conditions[1],
                'value' => $model->getStatutOccupantLogement() 
                            === Entries::STATUTS_OCCUPANT_LOGEMENT['statut_occupant_logement_1']
            ], [
                'condition' => $conditions[2],
                'value' => $model->getTypeOccupationLogement() 
                            === Entries::TYPES_OCCUPATION_LOGEMENT['type_occupation_logement_1']
            ], [
                'condition' => $conditions[3],
                'value' => $model->getAgeLogement() > 2
            ], [
                'condition' => $conditions[4],
                'value' => !empty( Repository::getOneOrNull($model->getMaPrimeRenovCodeTravaux()) )
            ], [
                'condition' => $conditions[5],
                'value' => null
            ], [
                'condition' => $conditions[6],
                'value' => null
            ]
        ];
    }

    /**
     * Retourne l'éligibilité à l'aide financière
     * @param ConditionInterface
     * @return bool
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        foreach (self::resolveConditions($model) as $condition) {
            if ($condition['value'] === false)  {
                return false;
            }
        }
        return true;
    }
}
