<?php

namespace App\Tests\Notifications\Service;

use App\Notifications\Service\UserNotificationService;
use App\Users\Entity\User;
use App\Users\Event\UserCreatedEvent;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class UserNotificationServiceTest extends TestCase
{
    public function testInvokeLogsUserCreation()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('info');

        $service = new UserNotificationService($logger);
        $user = new User();
        $user->setEmail('test@example.com');
        
        $service(new UserCreatedEvent($user));
    }
}