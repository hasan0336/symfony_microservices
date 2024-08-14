<?php

namespace App\Tests\Users\Service;

use App\Users\Service\UserService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class UserServiceTest extends TestCase
{
    public function testCreateUser(): void
    {
        $messageBus = $this->createMock(MessageBusInterface::class);
        $userService = new UserService($messageBus);

        $email = 'test@example.com';
        $firstName = 'John';
        $lastName = 'Doe';

        $userService->createUser($email, $firstName, $lastName);

        $logFile = __DIR__ . '/../../../../logs/users.log';
        $this->assertFileExists($logFile);
        $this->assertStringContainsString($email, file_get_contents($logFile));
    }
}
