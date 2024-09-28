<?php

namespace App\Clients\Tickets;

use App\Data\TicketsProvider\Requests\ReserveRequest;
use App\Data\TicketsProvider\Responses\EventData;
use App\Data\TicketsProvider\Responses\PlaceData;
use App\Data\TicketsProvider\Responses\ReserveData;
use App\Data\TicketsProvider\Responses\ShowsData;
use Illuminate\Support\Collection;

interface ITickets
{
    /**
     * @return Collection<ShowsData>
     */
    public function shows(): Collection;

    /**
     * @return Collection<EventData>
     */
    public function events(int $showId): Collection;

    /**
     * @return Collection<PlaceData>
     */
    public function places(int $eventId): Collection;

    public function reserve(ReserveRequest $request, int $eventId): ReserveData;
}
