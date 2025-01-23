<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'technician_id',
        'package_id',
        'order_date',
        'order_status',
        'installation_date',
        'snap_token'
    ];

    protected $hidden = [
        'snap_token'
    ];
}
