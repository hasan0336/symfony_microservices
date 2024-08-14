<?php

namespace App\Notifications\Service;

use App\Users\Event\UserCreatedEvent;

class UserNotificationService
{
    public function __invoke(UserCreatedEvent $event)
    {
        $logDir = __DIR__ . '/../../logs';
        $logFile = $logDir . '/notifications.log';

        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logData = sprintf("Notification: User created: %s, %s, %s", $event->getEmail(), $event->getFirstName(), $event->getLastName());
        file_put_contents($logFile, $logData . PHP_EOL, FILE_APPEND);
    }
}
