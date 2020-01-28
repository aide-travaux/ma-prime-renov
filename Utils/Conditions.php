<?php

namespace MaPrimeRenov\Utils;

use AideTravaux\Data\Entries;
use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use AideTravaux\Utils\Condition;
use MaPrimeRenov\Database\Database;

abstract class Conditions
{
    public static function get()
    {
        return [
            new Condition(
                'Les revenus du ménage occupant le logement sont inférieurs ou égaux au plafond fixé',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return \in_array( $profile->getAnahCategory(), Entries::ANAH_CATEGORIES );
                }
            ),
            new Condition(
                'Au moins un des membres du ménage occupant le logement en est le priopriétaire',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return 
                        $profile->getHousingOccupationStatus() 
                        === Entries::HOUSING_OCCUPATION_STATUS['proprietaire_occupant']
                    ;
                }
            ),
            new Condition(
                'Le logement est occupé à titre de résidence principale par le ou les propriétaires 
                à la date de début des travaux et prestations',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return 
                        $profile->getHousingOccupationType() 
                        === Entries::HOUSING_OCCUPATION_TYPES['residence_principale']
                    ;
                }
            ),
            new Condition(
                'Le logement ou l\'immeuble concerné est achevé depuis plus de deux ans à la date de 
                début des travaux et prestations',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return $profile->getBuildingExistence() > 2;
                }
            ),
            new Condition(
                'Les travaux sont éligibles',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return !empty( Database::getOne($project->getMaPrimeRenovWorkCode()) );
                }
            ),
            new Condition('Les travaux n\'ont pas encore commencé'),
            new Condition('Les travaux sont réalisés par une entreprise qualifiée RGE')
        ];
    }
}
