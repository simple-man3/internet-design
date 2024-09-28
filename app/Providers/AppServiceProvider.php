<?php

namespace App\Providers;

use App\Clients\Configuration;
use App\Clients\Tickets\ITickets;
use App\Clients\Tickets\TestApiClient;
use App\Enums\TicketProviderEnum;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Exception;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->bind(ITickets::class, function (Application $app) {
            $externalService = config('app.ticketProvider');
            $host = config('external-services.' . $externalService . '.host');

            $client = new Client();
            $config = new Configuration($host);

            return match ($externalService) {
                TicketProviderEnum::TestApi->value => new TestApiClient($client, $config),
                default => throw new Exception('ticket provider not found'),
            };
        });
    }
}
