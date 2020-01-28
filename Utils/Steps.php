<?php

namespace MaPrimeRenov\Utils;

use AideTravaux\Data\Entries;
use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use AideTravaux\Utils\Step;
use MaPrimeRenov\Database\Database;

abstract class Steps
{
    public static function get()
    {
        return [
            new Step(
                'Calcul du montant forfaitaire',
                'Montant forfaitaire de la prime en fonction de la nature des travaux, et de la situation du demandeur',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    $base = Database::getOneWithParams(
                        $project->getMaPrimeRenovWorkCode(),
                        $project->getBuildingArea(),
                        $profile->getAnahCategory()
                    );
                    return ($base) ? AmountCalculation::get($base['bonus'], $base['unit'], $project) : 0;
                }
            ),
            new Step(
                'Calcul du montant TTC des travaux après déduction des aides financières',
                'Les aides de l\'Anah, les certificats d\'économies d\'énergie et aides locales doivent être déduites',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return $project->getCostIncludingVAT();
                }
            ),
            new Step(
                'Calcul du reste à charge minimum',
                'Montant minimum des travaux à la charge du bénéficiaire après déduction des aides financières',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return $project->getCostIncludingVAT() - CeilingCoverage::get($profile, $project);
                }
            ),
            new Step(
                'Application du plafond',
                'Montant maximum de la prime versée à un même bénéficiaire sur une période de 5 ans',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return 20000;
                }
            )
        ];
    }
}
