<?php

namespace MaPrimeRenov\Model;

use AideTravaux\Model\ProfileInterface;
use AideTravaux\Model\ProjectInterface;
use AideTravaux\Model\SimulationInterface;
use AideTravaux\Model\SimulationTrait;
use MaPrimeRenov\Database\Database;
use MaPrimeRenov\Utils\AmountCalculation;
use MaPrimeRenov\Utils\CeilingBonus;
use MaPrimeRenov\Utils\CeilingCoverage;

class Simulation extends Aid implements SimulationInterface
{
    use SimulationTrait;

    /**
     * @property ProfileInterface
     */
    private $profile;

    /**
     * @property ProjectInterface
     */
    private $project;

    public function __construct(ProfileInterface $profile, ProjectInterface $project)
    {
        parent::__construct();

        $this->profile = $profile;
        $this->project = $project;

        $this->resolveConditions();
        $this->resolveSteps();
    }

    public function getProfile(): ProfileInterface
    {
        return $this->profile;
    }

    public function getProject(): ProjectInterface
    {
        return $this->project;
    }

    public function getAmount(): ?float
    {
        $base = Database::getOneWithParams(
            $this->project->getMaPrimeRenovWorkCode(),
            $this->project->getBuildingArea(),
            $this->profile->getAnahCategory()
        ) ;

        if ($base) {
            return (float) \min(
                AmountCalculation::get($base['bonus'], $base['unit'], $this->project),
                CeilingCoverage::get($this->profile, $this->project),
                CeilingBonus::get()
            );
        }
        return (float) 0;
    }
}
