<?php

namespace AideTravaux\MaPrimeRenov\Database\SE;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class SE01 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Audit énergétique';

    /**
     * @property
     */
    const CODE = 'MPR-SE-01';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getMontantForfaitaire($model);
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) self::getMontantForfaitaire($model) * $model->getNombreLogements();
            default:
                return (float) 0;
        }
    }

    /**
     * @inheritdoc
     */
    public static function getPlafond(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getPlafondForfaitaire($model);
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) self::getPlafondForfaitaire($model) * $model->getNombreLogements();
            default:
                return (float) 0;
        }
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
                        return 400;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 200;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 500;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 250;
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
        return 800;
    }
}
