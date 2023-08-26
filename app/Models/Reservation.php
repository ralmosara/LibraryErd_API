<?php

namespace App\Models;

use App\Filters\ReservationFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Reservation extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = ReservationFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'member_id',
        'payment_date',
        'payment_amount'
    ];


}
