<?php

namespace AideTravaux\MaPrimeRenov;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Model\DataInterface;
use AideTravaux\MaPrimeRenov\Model\ConditionInterface;
use AideTravaux\MaPrimeRenov\Repository\Repository;
use AideTravaux\MaPrimeRenov\Utils\ConditionsResolver;

abstract class MaPrimeRenov
{
    /**
     * @property string
     */
    const NOM = 'Ma Prime Rénov\'';

    /**
     * @property string
     */
    const DESCRIPTION = 'La Prime Rénov\' remplace le crédit d\'impôt pour la transition 
    énergétique à compter du 1er janvier 2020';
    
    /**
     * @property string
     */
    const DELAI = 'Sur présentation des factures - Avance possible';
    
    /**
     * @property string
     */
    const DISTRIBUTEUR = 'Agence nationale de l\'habitat';
    
    /**
     * @property array
     */
    const REFERENCES = [
        'https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400291&categorieLien=id',
        'https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376'
    ];

    /**
     * @property array
     */
    const CONDITIONS = [
        'Les revenus du ménage occupant le logement sont inférieurs au plafond fixé',
        'Au moins un des membres du ménage occupant le logement en est le priopriétaire',
        'Le logement est occupé à titre de résidence principale par le ou les propriétaires 
        à la date de début des travaux et prestations',
        'Le logement ou l\'immeuble concerné est achevé depuis plus de deux ans à la date de 
        début des travaux et prestations',
        'Les travaux sont éligibles',
        'Les travaux n\'ont pas encore commencé',
        'Les travaux sont réalisés par une entreprise qualifiée RGE'
    ];

    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float|null
     */
    public static function get(DataInterface $model): ?float
    {
        $base = Repository::getOneOrNull( $model->getMaPrimeRenovCodeTravaux() );

        return ($base) ? (float) \min(
            $base::getMontant($model),
            self::getPlafondCouverture($model),
            self::getPlafond()
        ) : null;
    }

    /**
     * Retourne le barême de l'aide financière
     * @param DataInterface
     * @return array|null
     */
    public static function getBareme(DataInterface $model): ?array
    {
        $base = Repository::getOneOrNull( $model->getMaPrimeRenovCodeTravaux() );

        return ($base) ? $base::toArray($model) : null;
    }

    /**
     * Retourne le plafond des dépenses éligibles mentionné au I de l'article 2 du décret 
     * n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique
     * @param DataInterface
     * @return float
     */
    public static function getPlafondDepensesEligibles(DataInterface $model): float
    {
        $base = Repository::getOneOrNull( $model->getMaPrimeRenovCodeTravaux() );

        return ($base) ? (float) \min(
            $base::getPlafond($model), 
            $model->getCoutTTC()
        ) : (float) 0;
    }

    /**
     * Retourne le plafond de couverture des travaux par la prime mentionné au V de 
     * l'article 3 du décret n° 2020-26 du 14 janvier 2020 relatif à la prime de 
     * transition énergétique
     * @param DataInterface
     * @return float
     */
    public static function getPlafondCouverture(DataInterface $model): float
    {
        $expenses = self::getPlafondDepensesEligibles($model);
    
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                return (float) $expenses * 0.75;
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                return (float) $expenses * 0.9;
            default:
                return (float) 0;
        }
    }

    /**
     * Retourne le plafond du montant de la prime mentionné au VII de l'article 3 du décret 
     * n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique
     * @return int
     */
    public static function getPlafond(): int
    {
        return 20000;
    }

    /**
     * @see ConditionsResolver
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        return ConditionsResolver::resolveConditions($model);
    }

    /**
     * @see ConditionsResolver
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        return ConditionsResolver::isEligible($model);
    }

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            'nom' => self::NOM,
            'description' => self::DESCRIPTION,
            'delai' => self::DELAI,
            'distributeur' => self::DISTRIBUTEUR,
            'references' => self::REFERENCES,
            'conditions' => self::CONDITIONS
        ];
    }

}
