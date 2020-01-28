<?php

namespace MaPrimeRenov\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\Model\AidAbstract;
use AideTravaux\Model\AidInterface;
use AideTravaux\Model\AidTrait;
use MaPrimeRenov\Model\Aid;

class AidTest extends TestCase
{
    public function testClassExtends()
    {
        $this->assertTrue(\in_array(AidAbstract::class, \class_parents(Aid::class)));
    }

    public function testClassInterface()
    {
        $this->assertTrue(\in_array(AidInterface::class, \class_implements(Aid::class)));
    }

    public function testClassTrait()
    {
        $this->assertTrue(\in_array(AidTrait::class, \class_uses(Aid::class)));
    }
 
}
