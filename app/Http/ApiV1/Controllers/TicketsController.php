<?php

namespace App\Http\ApiV1\Controllers;

use App\Http\ApiV1\Resources\ShowResource;
use App\Services\TicketService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TicketsController
{
    public function shows(TicketService $service): AnonymousResourceCollection
    {
        return ShowResource::collection($service->shows());
    }

    public function events(int $showId)
    {

    }

    public function places(int $eventId)
    {

    }

    public function reserve(int $eventId)
    {

    }
}
