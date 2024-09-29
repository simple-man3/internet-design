<?php

namespace Database\Factories\Tickets;

use App\Data\TicketsProvider\Responses\EventData;
use Database\Factories\BaseApiFactory;
use Illuminate\Support\Collection;

class EventFactory extends BaseApiFactory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'showId' => $this->faker->unique()->randomNumber(),
            'date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
        ];
    }

    public function makeListResponse(array $extra = [], int $count = 1): Collection
    {
        return $this->generateResponseList(EventData::class, $extra, $count);
    }
}
