<?php

namespace App\Users\Service;

use App\Users\Event\UserCreatedEvent;
use Symfony\Component\Messenger\MessageBusInterface;

class UserService
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function createUser(string $email, string $firstName, string $lastName): void
    {
        $logDir = __DIR__ . '/../../logs';
        $logFile = $logDir . '/users.log';

        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logData = sprintf("User created: %s, %s, %s", $email, $firstName, $lastName);
        file_put_contents($logFile, $logData . PHP_EOL, FILE_APPEND);

        $this->messageBus->dispatch(new UserCreatedEvent($email, $firstName, $lastName));
    }
}


