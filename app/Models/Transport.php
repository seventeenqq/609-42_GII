<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity_kg',
    ];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'route_transport');
    }
}
