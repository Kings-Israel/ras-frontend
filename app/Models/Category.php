<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    use HasFactory;

    public function getSearchResult(): SearchResult
    {
        // $url = route('vendor.view', $this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            // $url
        );
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the products for the Category
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
