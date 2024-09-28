<?php

namespace App\Data\TicketsProvider\Responses;

use Spatie\LaravelData\Data;

class ShowsData extends Data
{
    public function __construct(
        public readonly int    $id,
        public readonly string $name,
    )
    {
    }
}
