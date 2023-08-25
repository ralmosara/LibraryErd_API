<?php

namespace App\Models;

use App\Filters\Book_authorFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book_author extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Book_authorFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [

    ];
}
