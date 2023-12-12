<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
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

    /**
     * Get all of the conversations for the Order
     */
    public function conversations(): HasMany
    {
        return $this->hasMany(OrderConversation::class);
    }

    /**
     * Get the driver associated with the Order
     */
    public function driver(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'driver_id');
    }

    public function getTotalAmount($with_services = true): int
    {
        $amount = 0;
        foreach ($this->orderItems as $item) {
            $amount += (int) explode(' ', $item->quantity)[0] * (int) $item->amount;
            if ($with_services) {
                $amount += $item->orderRequests->where('status', 'accepted')->sum('cost');
            }
        }

        return $amount;
    }

    public function checkInspectionIsComplete(): DateTime|bool
    {
        $last_inspection_report_date = $this->updated_at;
        foreach ($this->orderItems as $item) {
            if (!$item->inspectionReport()->exists()) {
                return false;
            }

            if (Carbon::parse($item->inspectionReport->created_at)->greaterThan(Carbon::parse($last_inspection_report_date))) {
                $last_inspection_report_date = $item->inspectionReport->created_at;
            }
        }

        return $last_inspection_report_date;
    }
}
