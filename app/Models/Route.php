<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate_per_kg',
        'distance_km',
    ];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function transports(): BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'route_transport');
    }
}
