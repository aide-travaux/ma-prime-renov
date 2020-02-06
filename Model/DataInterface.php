<?php

namespace AideTravaux\MaPrimeRenov\Model;

interface DataInterface
{

    public function getMaPrimeRenovCodeTravaux(): string;

    public function getCategorieAnah(): string;

    public function getTypePartie(): string;

    public function getSurfaceIsolant(): float;

    public function getSurfaceProtegee(): float;

    public function getQuotePart(): float;

    public function getNombreLogements(): int;

    public function getNombreEquipement(): int;

    public function getCoutTTC(): float;

}
