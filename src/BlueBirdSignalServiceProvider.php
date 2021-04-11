<?php
declare(strict_types=1);

namespace BlueBirdSignalChannel\BlueBirdSignal;

use BlueBirdSignal\BlueBirdSignalChannel\Services\BlueBirdSignal;
use Illuminate\Support\ServiceProvider;

class BlueBirdSignalServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/bluebird-signal.php' => config_path('bluebird-signal.php')
        ], 'bluebird-signal');

        $this->app->when(BlueBirdSignalChannel::class)
            ->needs(BlueBirdSignal::class)
            ->give(function () {
                $bluebirdSignalConfig = config('bluebird-signal');

                if (is_null($bluebirdSignalConfig)) {
                    throw new \Exception('Invalid Configuration or Bluebird signal');
                }

                return new BlueBirdSignal(
                    $bluebirdSignalConfig['API_KEY'],
                );

            });
    }

    public function register(): void
    {

    }
}
