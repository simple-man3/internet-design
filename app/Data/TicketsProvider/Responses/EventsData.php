<?php

namespace App\Data\TicketsProvider\Responses;

use Spatie\LaravelData\Data;

class EventsData extends Data
{
    public function __construct(
        public readonly int    $id,
        public readonly int    $showId,
        public readonly string $date,
    )
    {
        /**
         * toDo
         *  [] трансформировать date из string в CarbonInterface
         */
    }
}
