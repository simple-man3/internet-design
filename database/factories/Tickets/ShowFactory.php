<?php

namespace Database\Factories\Tickets;

use App\Data\TicketsProvider\Responses\ShowsData;
use Database\Factories\BaseApiFactory;
use Illuminate\Support\Collection;

class ShowFactory extends BaseApiFactory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->unique()->numerify('Show ##'),
        ];
    }

    public function makeListResponse(array $extra = [], int $count = 1): Collection
    {
        return $this->generateResponseList(ShowsData::class, $extra, $count);
    }
}
