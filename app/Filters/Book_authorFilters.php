<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class Book_authorFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
