<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'technician_id',
        'package_id',
        'latitude',
        'longitude',
        'order_date',
        'order_status',
        'installation_date',
        'snap_token'
    ];

    protected $hidden = [
        'snap_token'
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id')->where('role', 'Technician');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('code', 'like', '%' . $search . '%')
        );
    }
}
