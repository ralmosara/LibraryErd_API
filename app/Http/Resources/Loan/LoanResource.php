<?php

namespace App\Http\Resources\Loan;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
