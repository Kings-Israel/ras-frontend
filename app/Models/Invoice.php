<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->invoice_id = Str::uuid();
        });
    }

    /**
     * Get the order id
     *
     * @param  string  $value
     * @return string
     */
    public function getInvoiceIdAttribute($value)
    {
        return Str::upper(explode('-', $value)[0]);
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
        return 'Kenya';
        $user_location = Http::withOptions(['verify' => false])->get('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$this->delivery_location_lat.','.$this->delivery_location_lng.'&key=AIzaSyCisnVFSnc5QVfU2Jm2W3oRLqMDrKwOEoM');

        foreach ($user_location['results'][0]['address_components'] as $place) {
            if (collect($place['types'])->contains('country')) {
                $country = Country::where('name', 'LIKE', $place['long_name'])->orWhere('iso', 'LIKE', $place['short_name'])->first();
                return $country->name;
            }
        }
    }

    public function canRequestFinancing(): bool
    {
        // $quotation_order = $this->orders->where('status', 'quotation request')->count();
        $accepted_order = $this->orders->where('status', 'accepted')->count();
        $pending_order = $this->orders->where('status', 'pending')->count();

        if ($pending_order <= 0 && $accepted_order <= 0) {
            return false;
        }

        return true;
    }

    /**
     * Get the user that owns the Invoice
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the orders for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the financingRequest associated with the Invoice
     */
    public function financingRequest(): HasOne
    {
        return $this->hasOne(FinancingRequest::class);
    }

    /**
     * Get the orderFinancing associated with the Invoice
     */
    public function orderFinancing(): HasOne
    {
        return $this->hasOne(OrderFinancing::class);
    }

    public function payment(): MorphTo
    {
        return $this->morphTo(EscrowPayment::class, 'payable');
    }
}
