# Ma Prime Rénov'

## Description

Aide financière pour la rénovation énergétique - Ma Prime Rénov'.

## Valeurs de retour

Retourne une Simulation de l'aide financière.

## Exemples

``
<?php

use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProfileTrait;
use AideTravaux\Model\ProjectInterface;
use AideTravaux\Model\ProjectTrait;
use MaPrimeRenov\Model\Simulation;

class Profile implements ProfileInterface
{
    use ProfileTrait;
}
class Project implements ProjectInterface
{
    use ProjectTrait;
}

$simulation = new Simulation(new Profile(), new Project());
``

## Sources

- [Décret n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400291&categorieLien=id)

- [Arrêté du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376&categorieLien=id)