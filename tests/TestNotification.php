<?php
declare(strict_types=1);

namespace BlueBirdSignalChannel\BlueBirdSignal\Test;

use BlueBirdSignalChannel\BlueBirdSignal\BlueBirdSignalMessage;
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
