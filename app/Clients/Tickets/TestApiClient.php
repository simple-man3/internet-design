<?php

namespace App\Clients\Tickets;

use App\Clients\Api;
use App\Clients\Configuration;
use App\Clients\RequestBuilder;
use App\Data\TicketsProvider\Responses\ReserveData;
use App\Data\TicketsProvider\Responses\ShowsData;
use App\Exceptions\ApiException;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\Collection;

class TestApiClient extends Api implements ITickets
{
    protected string $token;

    public function __construct(ClientInterface $client, Configuration $config)
    {
        parent::__construct($client, $config);

        $this->token = config('external-services.testApi.token');
    }

    /**
     * @throws ApiException
     */
    public function shows(): Collection
    {
        return $this->send(
            $this->getShowsRequest(),
            fn ($content) => ShowsData::collect($content['response'], Collection::class),
        );
    }

    private function getShowsRequest(): RequestBuilder
    {
        return new RequestBuilder(
            '/shows',
            'GET',
            [
                'Authorization' => $this->token
            ]
        );
    }

    public function events(int $showId): Collection
    {
        return $this->send(
            $this->getEventRequest(),
            fn ($content) => ShowsData::collect($content['response'], Collection::class),
        );
    }

    private function getEventRequest(): RequestBuilder
    {
        return new RequestBuilder();
    }

    public function places(int $eventId): Collection
    {
        return collect();

    }

    public function reserve(int $eventId): ReserveData
    {
        return new ReserveData();
    }
}
