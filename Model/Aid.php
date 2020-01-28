<?php

namespace MaPrimeRenov\Model;

use AideTravaux\Model\AidAbstract;
use AideTravaux\Model\AidInterface;
use AideTravaux\Model\AidTrait;
use MaPrimeRenov\Utils\Conditions;
use MaPrimeRenov\Utils\Steps;

abstract class Aid extends AidAbstract implements AidInterface
{
    use AidTrait;

    const NAME = 'Ma Prime Rénov\'';

    const DESCRIPTION = 'La Prime Rénov\' remplace le crédit d\'impôt pour la transition 
    énergétique à compter du 1er janvier 2020';
    
    const DELAY = 'Après la fin des travaux, avance possible';
    
    const DISTRIBUTOR = 'Agence nationale de l\'habitat';
    
    const REFERENCES = [
        'https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400291&categorieLien=id',
        'https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376'
    ];

    public function buildConditions(): void
    {
        foreach (Conditions::get() as $condition) {
            $this->addCondition($condition);
        }
    }

    public function buildSteps(): void
    {
        foreach (Steps::get() as $step) {
            $this->addStep($step);
        }
    }
}
