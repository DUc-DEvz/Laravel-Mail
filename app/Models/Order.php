<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_PENDING = 0;
    const STATUS_SHIPPED = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_CANCELED = 3;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'address',
        'status',
        'total_price',
        'shipped_at',
    ];

    protected $dates = ['shipped_at', 'deleted_at'];
}
