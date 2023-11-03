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

    public function resolvePaymentStatus(): string
    {
        switch ($this->payment_status) {
            case 'pending':
                return 'bg-gray-200';
                break;
            case 'paid':
                return 'bg-green-200';
                break;
            case 'cancelled':
                return 'bg-red-200';
                break;
            default:
                return 'bg-gray-200';
                break;
        }
    }

    public function getDeliveryCountry(): string
    {
        $user_location = Http::withOptions(['verify' => false])->get('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$this->delivery_location_lat.','.$this->delivery_location_lng.'&key=AIzaSyCisnVFSnc5QVfU2Jm2W3oRLqMDrKwOEoM');

        foreach ($user_location['results'][0]['address_components'] as $place) {
            if (collect($place['types'])->contains('country')) {
                $country = Country::where('name', 'LIKE', $place['long_name'])->orWhere('iso', 'LIKE', $place['short_name'])->first();
                return $country->name;
            }
        }
    }
}
