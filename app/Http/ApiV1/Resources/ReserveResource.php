<?php

namespace App\Http\ApiV1\Resources;

use App\Data\TicketsProvider\Responses\ReserveData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ReserveData */
class ReserveResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->success,
            'reservation_id' => $this->reservationId,
        ];
    }
}
