<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Business extends Model
{
    use HasFactory, HasSlug;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
}
