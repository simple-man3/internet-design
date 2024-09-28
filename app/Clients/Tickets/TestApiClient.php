<?php

namespace App\Clients\Tickets;

use App\Clients\Api;
use App\Clients\Configuration;
use App\Clients\RequestBuilder;
use App\Data\TicketsProvider\Requests\ReserveRequest;
use App\Data\TicketsProvider\Responses\EventData;
use App\Data\TicketsProvider\Responses\PlaceData;
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
            fn($content) => ShowsData::collect($content['response'], Collection::class),
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

    /**
     * @return Collection<EventData>
     *
     * @throws ApiException
     */
    public function events(int $showId): Collection
    {
        return $this->send(
            $this->getEventRequest($showId),
            fn($content) => EventData::collect($content['response'], Collection::class),
        );
    }

    private function getEventRequest(int $showId): RequestBuilder
    {
        return new RequestBuilder(
            '/shows/' . $showId . '/events',
            'GET',
            [
                'Authorization' => $this->token
            ]
        );
    }

    /**
     * @return Collection<PlaceData>
     *
     * @throws ApiException
     */
    public function places(int $eventId): Collection
    {
        return $this->send(
            $this->getPlacesRequest($eventId),
            fn($content) => PlaceData::collect($content['response'], Collection::class),
        );
    }

    private function getPlacesRequest(int $eventId): RequestBuilder
    {
        return new RequestBuilder(
            '/events/' . $eventId . '/places',
            'GET',
            [
                'Authorization' => $this->token
            ]
        );
    }

    /**
     * @throws ApiException
     */
    public function reserve(ReserveRequest $request, int $eventId): ReserveData
    {
        return $this->send(
            $this->getReverseRequest($request, $eventId),
            function (array $content) {
                if (isset($content['error'])) {
                    throw new ApiException($content['error']);
                }

                return ReserveData::from($content['response']);
            }
        );
    }

    private function getReverseRequest(ReserveRequest $request, int $eventId): RequestBuilder
    {
        return new RequestBuilder(
            '/events/' . $eventId . '/reserve',
            'POST',
            [
                'Authorization' => $this->token,
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            $request->toArray(),
            true,
        );
    }
}
