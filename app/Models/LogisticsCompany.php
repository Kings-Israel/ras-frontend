<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LogisticsCompany extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [''];

    public function countriesOfOperation()
    {
        return $this->morphMany(CountryOfOperation::class, 'operateable');
    }

    /**
     * The users that belong to the InspectingInstitution
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'logistics_company_users', 'logistics_company_id', 'user_id');
    }

    /**
     * Get the country that owns the InspectingInstitution
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
