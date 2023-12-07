<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class EscrowPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'invoice_id', 'status', 'amount'];

    /**
     * Get the user that owns the EscrowPayment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the invoice that owns the EscrowPayment
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function resolveStatus(): string
    {
        switch ($this->payment_status) {
            case 'pending':
                return 'bg-gray-200';
                break;
            case 'processing':
                return 'bg-yellow-200';
                break;
            case 'accepted':
                return 'bg-green-200';
                break;
            case 'declined':
                return 'bg-red-200';
                break;
            default:
                return 'bg-gray-200';
                break;
        }
    }
}
