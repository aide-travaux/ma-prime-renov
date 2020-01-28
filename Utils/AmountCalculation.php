<?php

namespace MaPrimeRenov\Utils;

use AideTravaux\Data\Entries;
use AideTravaux\Model\ProjectInterface;

abstract class AmountCalculation
{
    /**
     * @param int
     * @param string|null
     * @param ProjectInterface
     * @return float
     */
    public static function get(int $base, ?string $unit, ProjectInterface $project): float
    {
        switch ($unit) {
            case 'logement':
                return (float) $base * $project->getHousingNumber();

            case 'm²':
                if ($project->getBuildingArea() === Entries::BUILDING_AREAS['partie_commune']) {
                    return (float) $base * $project->getInsulationArea() * $project->getExpenseShare();
                }
                return (float) $base * $project->getInsulationArea();

            case 'equipement':
                return (float) $base * $project->getEquipmentNumber();
            
            default:
                return (float) $base;
        }
    }
}
