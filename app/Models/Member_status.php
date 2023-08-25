<?php

namespace App\Models;

use App\Filters\Member_statusFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member_status extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Member_statusFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [

    ];
}
