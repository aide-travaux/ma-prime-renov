# Ma Prime Rénov'

## Introduction

La classe MaPrimeRenov retourne toutes les informations relatives à l'aide financière Ma Prime Rénov'

## Constantes

**MaPrimeRenov::NOM**
Le nom de l'aide financière

**MaPrimeRenov::DESCRIPTION**
Une description de l'aide financière

**MaPrimeRenov::DELAI**
Délai de versement de l'aide financière

**MaPrimeRenov::DISTRIBUTEUR**
Distributeur de l'aide financière

**MaPrimeRenov::REFERENCES**
Références légales ou institutionnelles de l'aide financière

**MaPrimeRenov::CONDITIONS**
Conditions d'accès de l'aide financière

## Méthodes

```
MaPrimeRenov::get(DataInterface $model): ?float;
```
Retourne le montant calculé de l'aide financière sur la base des informations transmises

```
MaPrimeRenov::getBareme(DataInterface $model): ?array;
```
Retourne les barêmes en vigueur pour l'ouvrage transmis

```
MaPrimeRenov::getPlafondDepensesEligibles(DataInterface $model): float;
```
Retourne le plafond de dépenses éligibles calculé sur la base des informations transmises

```
MaPrimeRenov::getPlafondCouverture(DataInterface $model): float;
```
Retourne le plafond de couverture du coût des travaux par la prime calculé sur la base des informationstransmises

```
MaPrimeRenov::getPlafond(): int;
```
Retourne le plafond de l'aide financière

```
MaPrimeRenov::resolveConditions(ConditionInterface $model): array;
```
Retourne les conditions d'accès à l'aide et, pour chacune, si la condition est satisfaite sur la base des 
informations transmises

```
MaPrimeRenov::isEligible(ConditionInterface $model): bool;
```
Retourne l'éligibilité du projet à l'aide financière sur la base des informations transmises

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

    public function getNombreFenetres(): int
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

## Base de données 

| Code | Travaux |
| ---- | ------- |
| MPR-ENV-01 | Isolation des murs par l'extérieur |
| MPR-ENV-02 | Isolation des murs par l'intérieur |
| MPR-ENV-03 | Isolation des rampants de toiture et plafonds de combles |
| MPR-ENV-04 | Isolation des toitures terrasses |
| MPR-ENV-05 | Isolation thermique des parois vitrées |
| MPR-ENV-06 | Equipements ou matériaux de protection des parois vitrées ou opaques contre les rayonnements solaires, pour les immeubles situés à La Réunion, en Guyane, en Martinique, en Guadeloupe ou à Mayotte |
| MPR-TH-01 | Chaudières à très haute performance énergétique, à l'exception de celles utilisant le fioul comme source d'énergie |
| MPR-TH-02 | Chaudières à alimentation automatique fonctionnant au bois ou autres biomasse |
| MPR-TH-03 | Chaudières à alimentation manuelle fonctionnant au bois ou autres biomasse |
| MPR-TH-04 | Poêles à granulés, cuisinières à granulés |
| MPR-TH-05 | Poêles à bûches, cuisinières à bûches |
| MPR-TH-06 | Foyers fermés, inserts |
| MPR-TH-07 | Equipements de production de chauffage fonctionnant à l'énergie solaire thermique |
| MPR-TH-08 | Equipements de fourniture d'eau chaude sanitaire fonctionnant à l'énergie solaire thermique |
| MPR-TH-09 | Equipements de chauffage ou de fourniture d'eau chaude sanitaire fonctionnant avec des capteurs solaires hybrides thermiques et électriques à circulation de liquide |
| MPR-TH-10 | Pompes à chaleur géothermiques ou solarothermiques |
| MPR-TH-11 | Pompe à chaleur air/ eau |
| MPR-TH-12 | Pompes à chaleur dédiées à la production d'eau chaude sanitaire |
| MPR-TH-13 | Equipements de raccordement, ou droits et frais de raccordement, à un réseau de chaleur ou de froid |
| MPR-TH-14 | Dépose d'une cuve à fioul |
| MPR-TH-15 | Systèmes de ventilation mécanique contrôlée double flux autoréglables ou hygroréglables |
| MPR-SE-01 | Audit énergétique |

## Sources

- [Décret n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400291&categorieLien=id)

- [Arrêté du 14 janvier 2020 relatif à la prime de transition énergétique](https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376&categorieLien=id)
