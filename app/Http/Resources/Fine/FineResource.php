<?php

namespace App\Http\Resources\Fine;

use Illuminate\Http\Resources\Json\JsonResource;

class FineResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
