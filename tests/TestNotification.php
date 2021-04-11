<?php
declare(strict_types=1);

namespace BlueBirdSignal\BlueBirdSignalChannel\Test;

use BlueBirdSignal\BlueBirdSignalChannel\BlueBirdSignalMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    public function toBlueBirdSignal($notifiable)
    {
        return (new BlueBirdSignalMessage())
            ->setMessageKey('123-123-123-123')
            ->setSubject('Test Subject')
            ->setParameters([
                'foo' => 'bar'
            ]);
    }
}
