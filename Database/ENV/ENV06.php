<?php

namespace AideTravaux\MaPrimeRenov\Database\ENV;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DBInterface;
use AideTravaux\MaPrimeRenov\Database\DBTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class ENV06 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Equipements ou matériaux de protection des parois vitrées ou opaques contre 
    les rayonnements solaires, pour les immeubles situés à La Réunion, en Guyane, en Martinique, 
    en Guadeloupe ou à Mayotte';

    /**
     * @property
     */
    const CODE = 'MPR-ENV-06';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getMontantForfaitaire($model) * $model->getSurfaceProtegee();
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) 
                    self::getMontantForfaitaire($model) 
                    * $model->getSurfaceProtegee() 
                    * $model->getQuotePart()
                ;
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
                return (float) self::getPlafondForfaitaire($model) * $model->getSurfaceProtegee();
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) 
                    self::getPlafondForfaitaire($model) 
                    * $model->getSurfaceProtegee() 
                    * $model->getQuotePart()
                ;
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
                        return 20;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 20;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 25;
                    case Entries::TYPE_PARTIES['type_partie_2']:
                        return 25;
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
        return 200;
    }
}
