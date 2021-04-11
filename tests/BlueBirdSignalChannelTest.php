<?php
declare(strict_types=1);

namespace BlueBirdSignal\BlueBirdSignalChannel\Test;

use BlueBirdSignal\BlueBirdSignalChannel\BlueBirdSignalChannel;
use BlueBirdSignal\BlueBirdSignalChannel\Services\BlueBirdSignal;
use Orchestra\Testbench\TestCase;

class BlueBirdSignalChannelTest extends Testcase
{
    public $blueBirdSignal;
    public $channel;

    public function setUp(): void
    {
        parent::setUp();

        $this->blueBirdSignal = \Mockery::mock(BlueBirdSignal::class);
        $this->channel = new BlueBirdSignalChannel($this->blueBirdSignal);
    }

    public function test_it_send_notification()
    {
        $this->blueBirdSignal
            ->shouldReceive('send')
            ->once()
            ->with([
                'message_id' => '123-123-123-123',
                'to' => 'test@user.com',
                'from_email' => 'hello@example.com',
                'from_name' => 'Example',
                'subject' => 'Test Subject',
                'parameters' => [
                    'foo' => 'bar'
                ]
            ])
        ;

        $this->channel->send(new Notifiable(), new TestNotification());
    }
}
