<?php
declare(strict_types=1);

namespace BlueBirdSignalChannel\BlueBirdSignal\Test\Services;

use BlueBirdSignalChannel\BlueBirdSignal\Services\BlueBirdSignal;
use GuzzleHttp\Client;
use Orchestra\Testbench\TestCase;

class BlueBirdSignalTest extends TestCase
{
    public function test_send()
    {
        $clientHttpMock = \Mockery::mock(Client::class);
        $clientHttpMock->shouldReceive('request')
            ->with(
                'POST',
                'https://bluebirdsignal.com/api/send',
                [
                    'headers' => [
                        'Authorization' => 'Bearer api_key',
                        'Accept' => 'application/json'
                    ],
                    'json' => [
                        'foo' => 'bar'
                    ]
                ]
            );

        $blueBirdSignal = new BlueBirdSignal('api_key', $clientHttpMock);

        $blueBirdSignal->send(['foo' => 'bar']);
    }
}
