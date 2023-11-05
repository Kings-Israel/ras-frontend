<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Musonza\Chat\Traits\Messageable;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Traits\HasRoles;
use Chat;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Messageable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'phone_verified_at',
        'last_login',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatarAttribute($value)
    {
        if ($value != NULL) {
            return config('app.url').'/storage/user/avatars/'.$value;
        }
        return config('app.url').'/assets/img/user.png';
    }

    public function unreadMessagesCount(): int
    {
        $unread_messages_count = 0;

        if (auth()->check()) {
            $unread_messages_count = Chat::messages()->setParticipant(auth()->user())->unreadCount();
        }

        return $unread_messages_count;
    }

    public function pendingOrders(): int
    {
        $pending_orders = 0;

        if (auth()->check() && auth()->user()->hasRole('vendor')) {
            if (auth()->user()->business) {
                $pending_orders = auth()->user()->business->orders->where('status', 'pending')->count();
            }
        }

        return $pending_orders;
    }

    /**
     * Get the business associated with the User
     */
    public function business(): HasOne
    {
        return $this->hasOne(Business::class);
    }

    /**
     * Get the cart associated with the User
     */
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * Get all of the orders for the User
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get all of the cartItems for the User
     */
    public function cartItems(): HasManyThrough
    {
        return $this->hasManyThrough(CartItem::class, Cart::class);
    }

    /**
     * Get all of the invoices for the User
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * The warehouses that belong to the User
     */
    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(Warehouse::class, 'user_warehouses', 'warehouse_id', 'user_id');
    }

    /**
     * The financingInstitutions that belong to the User
     */
    public function financingInstitutions(): BelongsToMany
    {
        return $this->belongsToMany(FinancingInstitution::class, 'financing_institution_users', 'user_id', 'financing_institution_id');
    }

    /**
     * The financingInstitutions that belong to the User
     */
    public function inspectors(): BelongsToMany
    {
        return $this->belongsToMany(InspectingInstitution::class, 'inspector_users', 'user_id', 'inspector_id');
    }
}
