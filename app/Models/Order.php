<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->order_id = Str::uuid();
        });
    }

    /**
     * Get the order id
     *
     * @param  string  $value
     * @return string
     */
    public function getOrderIdAttribute($value)
    {
        return Str::upper(explode('-', $value)[0]);
    }

    /**
     * Get the user that owns the Order
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the orderItems for the Order
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the invoice that owns the Order
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the business that owns the Order
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * Get all of the inspectionRequests for the Order
     */
    public function inspectionRequests(): HasMany
    {
        return $this->hasMany(InspectionRequest::class);
    }
}
