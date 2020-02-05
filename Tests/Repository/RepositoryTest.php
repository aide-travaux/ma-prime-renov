<?php

namespace AideTravaux\MaPrimeRenov\Tests\Repository;

use PHPUnit\Framework\TestCase;
use AideTravaux\MaPrimeRenov\Repository\Repository;

class RepositoryTest extends TestCase
{
    public function testGetOneOrNull()
    {
        $this->assertTrue(\is_string(Repository::getOneOrNull('MPR-ENV-01')));
        $this->assertNull(Repository::getOneOrNull(''));
    }
}
