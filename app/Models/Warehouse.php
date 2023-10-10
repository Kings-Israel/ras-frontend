<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Warehouse extends Model
{
    use HasFactory;


    /**
     * The users that belong to the UserWarehouse
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_warehouses', 'user_id', 'warehouse_id');
    }

    /**
     * Get the country that owns the Warehouse
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the city that owns the Warehouse
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
