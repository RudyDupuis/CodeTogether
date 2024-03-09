<?php

use PHPUnit\Framework\TestCase;

class FakeTest extends TestCase
{
    public function testFake(): void
    {
        $this->assertTrue(true); // C'est juste un test factice qui réussit toujours.
    }
}
