<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicianAssignment extends Model
{
    protected $fillable = [
        'order_id',
        'technician_id',
        'assignment_status'
    ];

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id')->where('role', 'Technician');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
