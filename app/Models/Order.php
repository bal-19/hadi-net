<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'package_id',
        'latitude',
        'longitude',
        'status',
        'installation_date'
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function technicianAssignment()
    {
        return $this->hasOne(TechnicianAssignment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
