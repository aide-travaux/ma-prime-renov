<?php

namespace App;

use AideTravaux\ControllerInterface;
use App\Model\ProfileInterface;
use App\Model\ProjectInterface;

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
