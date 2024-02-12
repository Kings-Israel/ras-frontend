<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;

class InsuranceCompany extends Model
{
    use HasFactory, Messageable, Notifiable;

    public function countriesOfOperation()
    {
        return $this->morphMany(CountryOfOperation::class, 'operateable');
    }

    /**
     * The users that belong to the InspectingInstitution
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'insurance_company_users', 'insurance_company_id', 'user_id');
    }

    /**
     * Get all of the insuranceReports for the InspectingInstitution
     */
    public function insuranceReports(): HasMany
    {
        return $this->hasMany(InsuranceReport::class);
    }

    /**
     * Get the country that owns the InspectingInstitution
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function orderRequests(): MorphMany
    {
        return $this->morphMany(OrderRequest::class, 'requesteable');
    }
}
