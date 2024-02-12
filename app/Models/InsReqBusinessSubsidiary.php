<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsReqBusinessSubsidiary extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_subsidiaries';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the orderRequest that owns the InsReqBusinessSubsidiary
     */
    public function orderRequest(): BelongsTo
    {
        return $this->belongsTo(OrderRequest::class);
    }
}
