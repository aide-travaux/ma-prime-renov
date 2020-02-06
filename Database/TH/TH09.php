<?php

namespace AideTravaux\MaPrimeRenov\Database\TH;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DatabaseInterface;
use AideTravaux\MaPrimeRenov\Database\DatabaseTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class TH09 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Equipements de chauffage ou de fourniture d\'eau chaude sanitaire fonctionnant 
    avec des capteurs solaires hybrides thermiques et électriques à circulation de liquide';

    /**
     * @property
     */
    const CODE = 'MPR-TH-09';

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
                        return 2000;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 2500;
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
