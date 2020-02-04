# Ma Prime Rénov'

## Description

Aide financière pour la rénovation énergétique - Ma Prime Rénov'.

## Valeurs de retour

Retourne une Simulation de l'aide financière.

## Exemples

```
<?php

use AideTravaux\MaPrimeRenov\Model\DataInterface;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;
use AideTravaux\MaPrimeRenov\MaPrimeRenov;

class Data implements DataInterface, ConditionInterface
{

    public function getMaPrimeRenovCodeTravaux(): string
    {
        return 'MPR-ENV-01';
    }

    public function getCategorieAnah(): string
    {
        return 'Modeste';
    }

    public function getTypePartie(): string
    {
        return 'Partie privative';
    }

    public function getSurfaceIsolant(): float
    {
        return (float) 100;
    }

    public function getQuotePart(): float
    {
        return (float) 1;
    }

    public function getNombreLogements(): int
    {
        return 1;
    }

    public function getNombreEquipement(): int
    {
        return 1;
    }

    public function getCoutTTC(): float
    {
        return (float) 15000;
    }

    public function getTypeLogement(): string
    {
        return 'Maison individuelle';
    }

    public function getStatutOccupantLogement(): string
    {
        return 'Propriétaire occupant';
    }

    public function getTypeOccupationLogement(): string
    {
        return 'Résidence principale';
    }

    public function getAgeLogement(): int
    {
        return 30;
    }
}

$data = new Data();

MaPrimeRenov::get($data);
MaPrimeRenov::resolveConditions($data);

```

## Sources

- [Décret n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400291&categorieLien=id)

- [Arrêté du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376&categorieLien=id)