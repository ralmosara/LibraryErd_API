<?php

namespace App\Http\Resources\Member_status;

use Illuminate\Http\Resources\Json\JsonResource;

class Member_statusResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
