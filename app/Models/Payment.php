<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'billing_period',
        'status',
        'snap_token'
    ];

    protected $hidden = [
        'snap_token'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
