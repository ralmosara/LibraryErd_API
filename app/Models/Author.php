<?php

namespace App\Models;

use App\Filters\AuthorFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Author extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = AuthorFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function book_authors(): HasMany
    {
        return $this->hasMany(Book_author::class, 'id', 'author_id');
    }

}
