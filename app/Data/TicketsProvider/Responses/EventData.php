<?php

namespace App\Data\TicketsProvider\Responses;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class EventData extends Data
{
    public function __construct(
        public readonly int    $id,
        public readonly int    $showId,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public readonly Carbon $date,
    )
    {

    }
}
