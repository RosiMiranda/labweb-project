<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Library\Classes\StoreInfoUser;

class StoreInfoUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStoreInfoUser()
    {
        #1. Crear user
        $infoU = new StoreInfoUser('amy','amy@gmail.com');
        #2. Validar datos
        $this->assertTrue($infoU->getName() == 'amy' && $infoU->getEmail() == 'amy@gmail.com');
    }
}
