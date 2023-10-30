<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the cities for the Country
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    /**
     * Get all of the requiredDocuments for the Document
     */
    public function requiredDocuments(): HasManyThrough
    {
        return $this->hasManyThrough(Document::class, RequiredDocumentPerCountry::class, 'country_id', 'id', 'id', 'document_id');
    }
}
