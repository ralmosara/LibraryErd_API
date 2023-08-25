<?php

namespace App\Http\Resources\Author;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
