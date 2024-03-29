<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $user = new User();

        $user->setCreationAt();
        $date = new \DateTimeImmutable();
        $this->assertSame($date->getTimestamp(), $user->getCreationAt()->getTimestamp());

        $user->setEmail('test@example.com');
        $this->assertSame('test@example.com', $user->getEmail());

        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $this->assertSame(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());

        $password = 'testPassword';
        $user->setPassword($password);
        $this->assertTrue(password_verify($password, $user->getPassword()));
    }
}
