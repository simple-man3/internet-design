<?php

namespace Database\Factories\Tickets;

use App\Data\TicketsProvider\Responses\PlaceData;
use Database\Factories\BaseApiFactory;
use Illuminate\Support\Collection;

class PlaceFactory extends BaseApiFactory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'x' => $this->faker->randomNumber(),
            'y' => $this->faker->randomNumber(),
            'width' => $this->faker->randomNumber(),
            'height' => $this->faker->randomNumber(),
            'is_available' => $this->faker->boolean(),
        ];
    }

    public function makeListResponse(array $extra = [], int $count = 1): Collection
    {
        return $this->generateResponseList(PlaceData::class, $extra, $count);
    }
}
