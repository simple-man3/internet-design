<?php

namespace App\Services;

use App\Clients\Tickets\ITickets;
use App\Data\TicketsProvider\Requests\ReserveRequest;
use App\Data\TicketsProvider\Responses\PlaceData;
use App\Data\TicketsProvider\Responses\ReserveData;
use App\Data\TicketsProvider\Responses\ShowsData;
use Illuminate\Support\Collection;

final class TicketService
{
    public function __construct(private readonly ITickets $client)
    {
    }

    /**
     * @return Collection<ShowsData>
     */
    public function shows(): Collection
    {
        return $this->client->shows();
    }

    /**
     * @return Collection<ShowsData>
     */
    public function events(int $showId): Collection
    {
        return $this->client->events($showId);
    }

    /**
     * @return Collection<PlaceData>
     */
    public function places(int $eventId): Collection
    {
        return $this->client->places($eventId);
    }

    /**
     * @return Collection<PlaceData>
     */
    public function reserve(ReserveRequest $request, int $eventId): ReserveData
    {
        return $this->client->reserve($request, $eventId);
    }
}
