<?php

namespace MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use MaPrimeRenov\Database\Database;

class DatabaseTest extends TestCase
{
    public function testGetAll()
    {
        $this->assertTrue(\is_array(Database::getAll()));
    }

    public function testGetOneSuccess()
    {
        $this->assertTrue(\is_array(Database::getOne('SE-01')));
    }

    public function testGetOneFailure()
    {
        $this->assertTrue(count(Database::getOne('')) === 0);
    }

    public function testGetOneWithParamsSuccess()
    {
        $this->assertTrue(!empty(Database::getOneWithParams(
            'SE-01', 'Partie privative', 'Modeste'
        )));
    }

    public function testGetOneWithParamsFailure()
    {
        $this->assertTrue(empty(Database::getOneWithParams(
            'SE-01', 'Partie privative', 'null'
        )));
    }
}
