<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AuthorFilters extends QueryFilters
{
    protected array $allowedFilters = [
        'first_name',
        'last_name',
    ];

    protected array $columnSearch = [
        'first_name',
        'last_name',
    ];
}
