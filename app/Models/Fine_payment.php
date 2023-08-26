<?php

namespace App\Models;

use App\Filters\Fine_paymentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fine_payment extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Fine_paymentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'payment_date',
        'payment_amount'
    ];
}
