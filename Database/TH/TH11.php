<?php

namespace AideTravaux\MaPrimeRenov\Database\TH;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class TH11 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Pompe à chaleur air/ eau';

    /**
     * @property
     */
    const CODE = 'MPR-TH-11';

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
                        return 3000;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 2000;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 4000;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 3000;
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
                return 12000;
            case Entries::TYPE_PARTIES['type_partie_2']:
                return 18000;
            default:
                return 0;
        }
    }
}
