<?php
declare(strict_types=1);

namespace BlueBirdSignalChannel\BlueBirdSignal\Services;

use GuzzleHttp\Client;

class BlueBirdSignal
{
    private $appKey;
    private $httpClient;

    public function __construct($appKey, Client $httpClient)
    {
        $this->appKey = $appKey;
        $this->httpClient = $httpClient;
    }

    public function send($payload = []): void
    {
        $url = 'https://bluebirdsignal.com/api/send';

        try {
            $this->httpClient->request('POST', $url , [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->appKey,
                    'Accept'     => 'application/json',
                ],
                'json' => $payload,
            ]);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
