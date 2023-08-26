<?php

namespace App\Models;

use App\Filters\BookFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Book extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = BookFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'publication_date',
        'copies_owned'
    ];

    public function book_authors(): HasMany
    {
        return $this->hasMany(book_author::class, 'id', 'book_id');
    }


}
