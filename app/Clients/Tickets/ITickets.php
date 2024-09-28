<?php

namespace App\Clients\Tickets;

use App\Data\TicketsProvider\Responses\EventsData;
use App\Data\TicketsProvider\Responses\PlacesData;
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
     * @return Collection<EventsData>
     */
    public function events(int $showId): Collection;

    /**
     * @return Collection<PlacesData>
     */
    public function places(int $eventId): Collection;

    public function reserve(int $eventId): ReserveData;
}
