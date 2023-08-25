<?php

namespace App\Http\Resources\Reservation;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
