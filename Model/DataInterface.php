<?php

namespace AideTravaux\MaPrimeRenov\Model;

interface DataInterface
{
    /**
     * Retourne le code travaux Ma Prime Rénov
     * @return string
     */
    public function getMaPrimeRenovCodeTravaux(): string;

    /**
     * Retourne la catégorie de ressource du ménage selon l'ANAH
     * @return string
     */
    public function getCategorieAnah(): string;

    /**
     * Retourne le type de partie (commune ou privative)
     * @return string
     */
    public function getTypePartie(): string;

    /**
     * Retourne la surface d'isolant posé
     * @return float
     */
    public function getSurfaceIsolant(): float;

    /**
     * Retourne la quote-part des travaux supportée par le demandeur
     * @return float
     */
    public function getQuotePart(): float;

    /**
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreLogements(): int;

    /**
     * Nombre d'équipements installés
     */
    public function getNombreEquipement(): int;

    /**
     * Retourne le montant TTC des travaux déduit des aides financières
     * @return float
     */
    public function getCoutTTC(): float;

}
