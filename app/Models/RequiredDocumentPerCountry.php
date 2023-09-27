<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequiredDocumentPerCountry extends Model
{
    use HasFactory;

    /**
     * Get the country that owns the RequiredDocumentPerCountry
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the document that owns the RequiredDocumentPerCountry
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
