<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class MemberFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
