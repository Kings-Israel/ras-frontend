<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;

class InspectingInstitution extends Model
{
    use HasFactory, Messageable, Notifiable;

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
        return $this->belongsToMany(User::class, 'inspector_users', 'inspector_id', 'user_id');
    }

    /**
     * Get all of the inspectionReports for the InspectingInstitution
     */
    public function inspectionReports(): HasMany
    {
        return $this->hasMany(InspectionReport::class);
    }

    /**
     * Get the country that owns the InspectingInstitution
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
