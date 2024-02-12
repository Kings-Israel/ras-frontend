<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingPoster extends Model
{
    use HasFactory;

    /**
     * Get the image
     *
     * @param  string  $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        return config('app.admin_url').'/storage/marketing/poster/'.$value;
    }
}
