<?php

namespace AideTravaux\MaPrimeRenov\Database\TH;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DatabaseInterface;
use AideTravaux\MaPrimeRenov\Database\DatabaseTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class TH03 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Chaudières à alimentation manuelle fonctionnant au bois ou autres biomasse';

    /**
     * @property
     */
    const CODE = 'MPR-TH-03';

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
                        return 6500;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 2000;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 8000;
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
                return 16000;
            case Entries::TYPE_PARTIES['type_partie_2']:
                return 18000;
            default:
                return 0;
        }
    }
}
