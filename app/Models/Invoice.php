<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_PENDING = 0;
    const STATUS_PAID = 1;
    const STATUS_CANCELED = 2;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'due_date',
        'paid_at'
    ];

    protected $dates = ['due_date', 'paid_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
