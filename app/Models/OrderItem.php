<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'delivery_date' => 'date',
    ];

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
     * Get the inspectionRequest associated with the OrderItem
     */
    public function inspectionRequest(): HasOne
    {
        return $this->hasOne(InspectionRequest::class);
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

    /**
     * Get the deliveryRequest associated with the OrderItem
     */
    public function deliveryRequest(): HasOne
    {
        return $this->hasOne(OrderDeliveryRequest::class);
    }

    /**
     * Get the storageRequest associated with the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storageRequest(): HasOne
    {
        return $this->hasOne(OrderStorageRequest::class);
    }

    /**
     * Get all of the quotationResponses for the OrderItem
     */
    public function quotationResponses(): HasMany
    {
        return $this->hasMany(QuotationRequestResponse::class);
    }

    /**
     * Get the insuranceRequest associated with the OrderItem
     */
    public function insuranceRequest(): HasOne
    {
        return $this->hasOne(InsuranceRequest::class);
    }

    /**
     * Get all of the orderRequests for the OrderItem
     */
    public function orderRequests(): HasMany
    {
        return $this->hasMany(OrderRequest::class);
    }

    public function hasAcceptedAllRequests(): bool
    {
        $order_requests = $this->orderRequests->groupBy('requesteable_type');

        $requested_services_count = count($order_requests);

        $accepted_requests_count = 0;

        foreach ($order_requests as $key => $order_request) {
            if (collect($order_request)->where('status', 'accepted')->first()) {
                $accepted_requests_count += 1;
                continue;
            }
        }

        if ($accepted_requests_count == $requested_services_count) {
            return true;
        }

        return false;
    }
}
