<?php

namespace App\Data\TicketsProvider\Responses;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class ReserveData extends Data
{
    public function __construct(
        public readonly bool   $success,
        #[MapInputName('reservation_id')]
        #[MapOutputName('reservation_id')]
        public readonly string $reservationId,
    )
    {
    }
}
