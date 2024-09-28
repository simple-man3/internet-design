<?php

namespace App\Data\TicketsProvider\Responses;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class PlaceData extends Data
{
    public function __construct(
        public readonly int   $id,
        public readonly float $x,
        public readonly float $y,
        public readonly float $width,
        public readonly float $height,
        #[MapInputName('is_available')]
        #[MapOutputName('is_available')]
        public readonly bool  $isAvailable,
    )
    {
    }
}
