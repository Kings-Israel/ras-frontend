<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use HasFactory, HasSlug;

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
        'is_available' => 'bool',
    ];

    public function getSearchResult(): SearchResult
    {
        if (auth()->check() && auth()->user()->business && $this->business->id && auth()->user()->business->id) {
            $url = route('vendor.products.show', $this->slug);
        } else {
            $url = route('product', $this->slug);
        }

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
            ->usingSeparator('_')
            ->doNotGenerateSlugsOnUpdate();
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
     * Scope a query to only include isAvailable
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    /**
     * Get the certificate of origin
     *
     * @param  string  $value
     * @return string
     */
    public function getCertificateOfOriginAttribute($value)
    {
        return config('app.url').'/storage/product/certificate/'.$value;
    }

    public function isInCart(): bool
    {
        if(auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->get();
            foreach ($cart as $user_cart) {
                if (CartItem::where('cart_id', $user_cart->id)->where('product_id', $this->id)->first()) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    /**
     * Get the category that owns the Product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the business that owns the Product
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * Get all of the media for the Product
     */
    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }

    /**
     * The warehouses that belong to the Product
     */
    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_products', 'product_id', 'warehouse_id');
    }

    /**
     * The cartItems that belong to the Product
     */
    public function cartItems(): BelongsToMany
    {
        return $this->belongsToMany(CartItem::class);
    }

    /**
     * Get all of the orderItems for the Product
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the discount associated with the Product
     */
    public function discount(): HasOne
    {
        return $this->hasOne(ProductDiscount::class);
    }
}
