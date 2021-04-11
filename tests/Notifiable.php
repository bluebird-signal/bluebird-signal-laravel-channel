<?php
declare(strict_types=1);

namespace BlueBirdSignal\BlueBirdSignalChannel\Test;

class Notifiable
{
    use \Illuminate\Notifications\Notifiable;

    public $email;

    public function __construct()
    {
        $this->email = 'test@user.com';
    }
}
