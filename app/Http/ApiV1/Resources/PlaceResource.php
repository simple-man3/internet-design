<?php

namespace App\Http\ApiV1\Resources;

use App\Data\TicketsProvider\Responses\PlaceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin PlaceData */
class PlaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'x' => $this->x,
            'y' => $this->y,
            'width' => $this->width,
            'height' => $this->height,
            'is_available' => $this->isAvailable,
        ];
    }
}
