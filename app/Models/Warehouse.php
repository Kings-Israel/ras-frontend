<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;

class Warehouse extends Model
{
    use HasFactory, Notifiable, Messageable;


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

    /**
     * The products that belong to the Warehouse
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'warehouse_products', 'warehouse_id', 'product_id')->withPivot('created_at', 'quantity', 'status', 'payment_status');
    }

    /**
     * Get all of the warehouseOrders for the Warehouse
     */
    public function warehouseOrders(): HasMany
    {
        return $this->hasMany(WarehouseOrder::class);
    }

    public function orderRequests(): MorphMany
    {
        return $this->morphMany(OrderRequest::class, 'requesteable');
    }

    public function wallet(): MorphOne
    {
        return $this->morphOne(Wallet::class, 'walleteable');
    }

    public function releaseProductRequests(): HasMany
    {
        return $this->hasMany(ReleaseProductRequest::class);
    }

    /**
     * Get all of the vendorStorageRequests for the Warehouse
     */
    public function vendorStorageRequests(): HasMany
    {
        return $this->hasMany(VendorStorageRequest::class);
    }
}
