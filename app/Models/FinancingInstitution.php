<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class FinancingInstitution extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The users that belong to the FinancingInstitution
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'financing_institution_users', 'financing_institution_id', 'user_id');
    }
}
