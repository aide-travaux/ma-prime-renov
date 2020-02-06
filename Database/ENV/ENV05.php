<?php

namespace AideTravaux\MaPrimeRenov\Database\ENV;

use AideTravaux\MaPrimeRenov\Data\Entries;
use AideTravaux\MaPrimeRenov\Database\DatabaseInterface;
use AideTravaux\MaPrimeRenov\Database\DatabaseTrait;
use AideTravaux\MaPrimeRenov\Model\DataInterface;

abstract class ENV05 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Isolation thermique des parois vitrées';

    /**
     * @property
     */
    const CODE = 'MPR-ENV-05';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return self::getMontantForfaitaire($model) * $model->getNombreEquipement();
    }

    /**
     * @inheritdoc
     */
    public static function getPlafond(DataInterface $model): float
    {
        return self::getPlafondForfaitaire($model) * $model->getNombreEquipement();
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
                        return 80;
                    default:
                        return 0;
                }
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                switch ($model->getTypePartie()) {
                    case Entries::TYPE_PARTIES['type_partie_1']:
                        return 100;
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
        return 1000;
    }
}
