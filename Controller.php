<?php

namespace MaPrimeRenov;

use AideTravaux\ControllerInterface;
use MaPrimeRenov\Model\ProfileInterface;
use MaPrimeRenov\Model\ProjectInterface;

class Controller implements ControllerInterface
{
    public function isProfileEligible(ProfileInterface $profile): bool
    {
        return true;
    }

    public function isProjectEligible(ProjectInterface $project): bool
    {
        return true;
    }

    public function getProfileConditions(ProfileInterface $profile): array
    {
        return [];
    }

    public function getProjectConditions(ProjectInterface $project): array
    {
        return [];
    }

    public function getAmount(ProfileInterface $profile, ProjectInterface $project)
    {
        return 0;
    }

}
