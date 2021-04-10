<?php
declare(strict_types=1);

namespace BlueBirdSignalChannel\BlueBirdSignal;

use BlueBirdSignalChannel\BlueBirdSignal\Services\BlueBirdSignal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;


class BlueBirdSignalChannel
{
    /**
     * @var BlueBirdSignal
     */
    private $blueBirdSignal;

    public function __construct(BlueBirdSignal $blueBirdSignal)
    {
        $this->blueBirdSignal = $blueBirdSignal;
    }

    public function send($notifiable, Notification $notification)
    {
        $routeNotification = $notifiable->routeNotificationFor('BlueBirdSignal');

        $this->blueBirdSignal->send($this->buildPayload(
            $notifiable,
            $notification->toBlueBirdSignal($notifiable),
            $routeNotification
        ));
    }

    private function buildPayload($notifiable, BlueBirdSignalMessage $notification, $routeNotification)
    {
        $email = $routeNotification['email'] ?? $notifiable->email;
        $subject = $notification->subject ?? 'Message from '. config('mail.from.name');

        return [
            'message_id' => $notification->messageKey,
            'to' => $email,
            'from_email' => config('mail.from.address'),
            'from_name' => config('mail.from.name'),
            'subject' => $subject,
            'parameters' => $notification->parameters,
        ];
    }
}
