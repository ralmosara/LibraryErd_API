<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AuthorFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
