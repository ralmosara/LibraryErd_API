<?php

namespace App\Models;

use App\Filters\FineFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fine extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = FineFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'loan_id',
        'fine_date',
        'fine_amount'
    ];
}
