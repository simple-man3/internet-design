<?php

namespace App\Http\ApiV1\Controllers;

use App\Http\ApiV1\Resources\EventResource;
use App\Http\ApiV1\Resources\PlaceResource;
use App\Http\ApiV1\Resources\ShowResource;
use App\Services\TicketService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TicketsController
{
    public function shows(TicketService $service): AnonymousResourceCollection
    {
        return ShowResource::collection($service->shows());
    }

    public function events(TicketService $service, int $showId): AnonymousResourceCollection
    {
        return EventResource::collection($service->events($showId));
    }

    public function places(TicketService $service, int $eventId): AnonymousResourceCollection
    {
        return PlaceResource::collection($service->places($eventId));
    }

    public function reserve(int $eventId)
    {

    }
}
