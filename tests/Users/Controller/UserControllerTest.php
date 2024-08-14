<?php

namespace App\Tests\Users\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser(): void
    {
        $client = static::createClient();
        $client->request('POST', '/users', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ]));

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['status' => 'User created!']);
    }
}
