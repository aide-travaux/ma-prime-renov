<?php

namespace MaPrimeRenov\Database;

use AideTravaux\Data\Entries;

abstract class Database
{
    /**
     * Retourne tous les travaux en base
     * @return array
     */
    public static function getAll(): array
    {
        return \array_merge(
            Env::DB, Se::DB, Th::DB
        );
    }

    /**
     * Retourne un ouvrage correspondant au code en paramètre
     * @param string
     * @return array
     */
    public static function getOne(string $code): array
    {
        $base = \array_filter(self::getAll(), function($row) use ($code) {
            return $row['code'] === $code;
        });

        return ($base) ? \current($base) : $base;
    }

    /**
     * Retourne un ouvrage correspondant aux paramètres fournis
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getOneWithParams(string $code, string $buildingArea, string $anahCategory): array
    {
        $base = self::getOne($code) ;
        $buildingAreaKey = \array_search( $buildingArea, Entries::BUILDING_AREAS, true );
        $anahCategoryKey = \array_search( $anahCategory, Entries::ANAH_CATEGORIES, true );

        if (isset($base['bonus'][$buildingAreaKey][$anahCategoryKey])) {
            return [
                'label' => $base['label'],
                'code' => $base['code'],
                'bonus' => $base['bonus'][$buildingAreaKey][$anahCategoryKey],
                'ceiling' => $base['bonus'][$buildingAreaKey]['ceiling'],
                'unit' => $base['bonus'][$buildingAreaKey]['unit']
            ];
        }
        return [];
    }

}
