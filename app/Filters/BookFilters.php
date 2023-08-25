<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class BookFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
