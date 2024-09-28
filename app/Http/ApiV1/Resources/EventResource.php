<?php

namespace App\Http\ApiV1\Resources;

use App\Data\TicketsProvider\Responses\EventData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EventData */
class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'show_id' => $this->showId,
            'date' => $this->date->format('Y-m-d H:i:s'),
        ];
    }
}
