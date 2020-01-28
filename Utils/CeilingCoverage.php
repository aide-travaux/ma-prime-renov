<?php

namespace MaPrimeRenov\Utils;

use AideTravaux\Data\Entries;
use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;

/**
 * Plafond du montant de la prime mentionné au V de l'article 3 du décret 
 * n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique
 */
abstract class CeilingCoverage
{
    /**
     * @param ProfileInterface
     * @param ProjectInterface
     * @return float
     */
    public static function get(ProfileInterface $profile, ProjectInterface $project): float
    {
        $expenses = CeilingExpense::get($profile, $project);
    
        switch ($profile->getAnahCategory()) {
            case Entries::ANAH_CATEGORIES['tres_modeste']:
                return (float) $expenses * 0.9;
            
            case Entries::ANAH_CATEGORIES['modeste']:
                return (float) $expenses * 0.75;
            
            default:
                return (float) 0;
        }
    }
}
