<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notification;

class Business extends Model implements Searchable
{
    use HasFactory, HasSlug, Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $searchableType = 'vendors';

    public function getSearchResult(): SearchResult
    {
        $url = route('vendor.storefront', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name', 'id'])
            ->saveSlugsTo('slug')
            ->usingSeparator('_');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->contact_email;
    }

    /**
     * Get the primary image
     *
     * @param  string  $value
     * @return string
     */
    public function getPrimaryCoverImageAttribute($value)
    {
        return config('app.url').'/storage/vendor/cover_image/'.$value;
    }

    /**
     * Get the primary image
     *
     * @param  string  $value
     * @return string
     */
    public function getSecondaryCoverImageAttribute($value)
    {
        if ($value) {
            return config('app.url').'/storage/vendor/cover_image/'.$value;
        }
    }

    /**
     * Get the business profile
     *
     * @param  string  $value
     * @return string
     */
    public function getBusinessProfileAttribute($value)
    {
        if ($value) {
            return config('app.url').'/storage/vendor/profile/'.$value;
        }
    }

    public function verified():bool
    {
        if ($this->verified_on) {
            return true;
        }

        return false;
    }

    /**
     * Get the user that owns the Business
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the documents for the Business
     */
    public function documents(): HasMany
    {
        return $this->hasMany(BusinessDocument::class);
    }

    /**
     * Get the country that owns the Business
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function countriesOfOperation(): MorphMany
    {
        return $this->morphMany(CountryOfOperation::class, 'operateable');
    }

    /**
     * Get the city that owns the Business
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get all of the products for the Business
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get all of the orders for the Business
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the metaData associated with the Business
     */
    public function metaData(): HasOne
    {
        return $this->hasOne(BusinessMetaData::class);
    }

    /**
     * Get all of the warehouseStorageRequests for the Business
     */
    public function warehouseStorageRequests(): HasMany
    {
        return $this->hasMany(VendorStorageRequest::class);
    }

    public function isBookmarked(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return VendorBookmark::where('business_id', $this->id)
                                ->where('user_id', auth()->id())
                                ->exists();
    }

    public function addToBookmarks(User $user)
    {
        VendorBookmark::create([
            'user_id' => $user->id,
            'business_id' => $this->id
        ]);
    }

    public function removeFromBookmarks(User $user)
    {
        VendorBookmark::where('business_id', $this->id)
                                ->where('user_id', auth()->id())
                                ->delete();
    }
}
