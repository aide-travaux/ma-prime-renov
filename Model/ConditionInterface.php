<?php

namespace AideTravaux\MaPrimeRenov\Model;

interface ConditionInterface
{

    public function getMaPrimeRenovCodeTravaux(): string;

    public function getCategorieAnah(): string;

    public function getTypeLogement(): string;

    public function getStatutOccupantLogement(): string;

    public function getTypeOccupationLogement(): string;

    public function getAgeLogement(): int;

}
