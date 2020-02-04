<?php

namespace AideTravaux\MaPrimeRenov\Model;

interface ConditionInterface
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
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne le statut des occupants du logement
     * @return string
     */
    public function getStatutOccupantLogement(): string;

    /**
     * Retourne le type d'occupation du logement
     * @return string
     */
    public function getTypeOccupationLogement(): string;

    /**
     * Retourne l'âge du logement
     * @return int
     */
    public function getAgeLogement(): int;

}
