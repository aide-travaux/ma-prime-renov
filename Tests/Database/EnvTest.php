<?php

namespace MaPrimeRenov\Tests\Database;

use PHPUnit\Framework\TestCase;
use MaPrimeRenov\Database\Env;

class EnvTest extends TestCase
{
    public function testConstantExist()
    {
        $this->assertTrue(!empty(Env::DB) && \is_array(Env::DB));
	}

	public function testConstantFormat()
	{
		foreach (Env::DB as $row) {
			$this->assertTrue(\is_array($row));

			$this->assertTrue(\array_key_exists('label', $row));
			$this->assertTrue(\array_key_exists('code', $row));
			$this->assertTrue(\array_key_exists('bonus', $row));

			if (isset($row['bonus'])) {
				$this->assertTrue(\array_key_exists('partie_privative', $row['bonus']));

				if (isset($row['bonus']['partie_privative'])) {
					$this->assertTrue(\array_key_exists('tres_modeste', $row['bonus']['partie_privative']));
					$this->assertTrue(\array_key_exists('modeste', $row['bonus']['partie_privative']));
					$this->assertTrue(\array_key_exists('ceiling', $row['bonus']['partie_privative']));
					$this->assertTrue(\array_key_exists('unit', $row['bonus']['partie_privative']));
				}
				if (isset($row['bonus']['partie_commune'])) {
					$this->assertTrue(\array_key_exists('tres_modeste', $row['bonus']['partie_commune']));
					$this->assertTrue(\array_key_exists('modeste', $row['bonus']['partie_commune']));
					$this->assertTrue(\array_key_exists('ceiling', $row['bonus']['partie_commune']));
					$this->assertTrue(\array_key_exists('unit', $row['bonus']['partie_privative']));
				}
			}
		}
	}
}
