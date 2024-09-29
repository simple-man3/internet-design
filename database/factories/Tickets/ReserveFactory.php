<?php

namespace Database\Factories\Tickets;

use App\Data\TicketsProvider\Responses\ReserveData;
use Database\Factories\BaseApiFactory;
use Illuminate\Support\Collection;

class ReserveFactory extends BaseApiFactory
{
    public function definition(): array
    {
        return [
            'success' => $this->faker->boolean(),
            'reservation_id' => $this->faker->unique()->randomNumber(),
        ];
    }

    public function makeResponse(array $extra = []): Collection
    {
        return collect([
            'data' => ReserveData::from($this->make($extra))
        ]);
    }
}
