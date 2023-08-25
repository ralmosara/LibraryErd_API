<?php

namespace App\Http\Resources\Book_author;

use Illuminate\Http\Resources\Json\JsonResource;

class Book_authorResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
