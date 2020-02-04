<?php

namespace AideTravaux\MaPrimeRenov\Database;

use AideTravaux\MaPrimeRenov\Model\DataInterface;

/**
 * @see https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000041400376
 */
interface DBInterface
{
    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float
     */
    public static function getMontant(DataInterface $model): float;

    /**
     * Retourne le montant du plafond de dépenses éligibles
     * @param DataInterface
     * @return float
     */
    public static function getPlafond(DataInterface $model): float;

    /**
     * Retourne le montant forfaitaire de l'aide financière
     * @param DataInterface
     * @return int
     */
    public static function getMontantForfaitaire(DataInterface $model): int;

    /**
     * Retourne le montant forfaitaire du plafond de dépenses éligibles
     * @param DataInterface
     * @return int
     */
    public static function getPlafondForfaitaire(DataInterface $model): int;

    /**
     * @param DataInterface
     * @return array
     */
    public static function toArray(DataInterface $model): array;
}
