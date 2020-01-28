<?php

namespace MaPrimeRenov\Utils;

use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use MaPrimeRenov\Database\Database;

/**
 * Plafond des dépenses éligibles mentionné au I de l'article 2 du décret 
 * n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique
 */
abstract class CeilingExpense
{
    /**
     * @param ProfileInterface
     * @param ProjectInterface
     * @return float
     */
    public static function get(ProfileInterface $profile, ProjectInterface $project): float
    {
        $base = Database::getOneWithParams(
            $project->getMaPrimeRenovWorkCode(),
            $project->getBuildingArea(),
            $profile->getAnahCategory()
        );

        if ($base) {
            return (float) \min(
                AmountCalculation::get($base['ceiling'], $base['unit'], $project),
                $project->getCostIncludingVAT()
            );
        }
        return (float) 0;
    }
}
