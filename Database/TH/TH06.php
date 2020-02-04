<?php

namespace AideTravaux\MaPrimeRenov\Database\TH;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class TH06 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Foyers fermés, inserts';

    /**
     * @property
     */
    const CODE = 'MPR-TH-06';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model);
    }

    /**
     * @inheritdoc
     */
    public static function getPlafond(DataInterface $model): float
    {
        return (float) self::getPlafondForfaitaire($model);
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 1200;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 2000;
                    default:
                        return 0;
                }
            default:
                return 0;
        }
    }

    /**
     * @inheritdoc
     */
    public static function getPlafondForfaitaire(DataInterface $model): int
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return 4000;
            default:
                return 0;
        }
    }
}
