<?php

namespace App\Http\Resources\Reservation_status;

use Illuminate\Http\Resources\Json\JsonResource;

class Reservation_statusResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
