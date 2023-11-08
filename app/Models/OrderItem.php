<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the order that owns the OrderItem
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the OrderItem
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the inspectionReport associated with the OrderItem
     */
    public function inspectionReport(): HasOne
    {
        return $this->hasOne(InspectionReport::class);
    }

    /**
     * Get the warehouseOrder associated with the OrderItem
     */
    public function warehouseOrder(): HasOne
    {
        return $this->hasOne(WarehouseOrder::class);
    }
}
