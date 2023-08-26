<?php

namespace App\Models;

use App\Filters\Book_authorFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'book_id',
        'author_id'
    ];

    public function book_author(): HasOne
    {
        return $this->HasOne(Author::class, 'author_id', 'id');
    }

    public function book(): HasOne
    {
        return $this->HasOne(Book::class, 'book_id', 'id');
    }
    
}
