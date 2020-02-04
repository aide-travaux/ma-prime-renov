<?php

namespace AideTravaux\MaPrimeRenov\Utils;

use AideTravaux\MaPrimeRenov\MaPrimeRenov;
use AideTravaux\MaPrimeRenov\Model\DataInterface;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;

abstract class DataFormater
{
    /**
     * @param mixed|null
     * @return array
     */
    public static function get($model = null): array
    {
        $array = MaPrimeRenov::toArray();

        if ($model instanceof DataInterface) {
            $array = \array_merge($array, [
                'montant' => MaPrimeRenov::get($model),
                'bareme' => MaPrimeRenov::getBareme($model),
                'plafond_depenses_eligibles' => MaPrimeRenov::getPlafondDepensesEligibles($model),
                'plafond_couverture' => MaPrimeRenov::getPlafondCouverture($model),
                'plafond' => MaPrimeRenov::getPlafond($model)
            ]);
        }

        if ($model instanceof ConditionInterface) {
            $array = \array_merge($array, [
                'conditions' => MaPrimeRenov::resolveConditions($model),
                'isEligible' => MaPrimeRenov::isEligible($model)
            ]);
        }

        return $array;
    }
}
