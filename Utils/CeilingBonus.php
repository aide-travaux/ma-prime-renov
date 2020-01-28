<?php

namespace MaPrimeRenov\Utils;

/**
 * Plafond du montant de la prime mentionné en introduction du décret 
 * n° 2020-26 du 14 janvier 2020 relatif à la prime de transition énergétique
 */
abstract class CeilingBonus
{
    /**
     * @return int
     */
    public static function get(): int
    {
        return 20000;
    }
}
