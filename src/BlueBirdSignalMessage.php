<?php
declare(strict_types=1);

namespace BlueBirdSignal\BlueBirdSignalChannel;

class BlueBirdSignalMessage
{
    public $parameters;
    public $messageKey;
    public $subject;

    public function setMessageKey($messageKey): self
    {
        $this->messageKey = $messageKey;

        return $this;
    }

    public function setSubject($subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function setParameters($parameters = []): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
