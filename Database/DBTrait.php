<?php

namespace AideTravaux\MaPrimeRenov\Database;

use AideTravaux\MaPrimeRenov\Model\DataInterface;

trait DBTrait
{
    /**
     * @inheritdoc
     */
    public static function toArray(DataInterface $model): array
    {
        return [
            'nom' => self::NOM,
            'code' => self::CODE,
            'montant' => self::getMontant($model),
            'montant_forfaitaire' => self::getMontantForfaitaire($model),
            'plafond' => self::getPlafond($model),
            'plafond_forfaitaire' => self::getPlafondForfaitaire($model)
        ];
    }
}
