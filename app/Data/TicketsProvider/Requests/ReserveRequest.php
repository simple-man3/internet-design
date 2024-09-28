<?php

namespace App\Data\TicketsProvider\Requests;

use Spatie\LaravelData\Data;

class ReserveRequest extends Data
{
    public function __construct(
        public readonly string $name,
        /** @var int[] */
        public readonly array $places,
    )
    {
    }
}
