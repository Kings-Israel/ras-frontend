<?php

namespace App\Models;

use App\Helpers\NumberGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function generate(string $identifier, int $validity_period): Otp
    {
        self::where('identifier', $identifier)->delete();
        
        return self::create([
            'identifier' => $identifier,
            'token' => NumberGenerator::generateUniqueNumber(Otp::class, 'token'),
            'validity' => $validity_period,
        ]);
    }

    public static function validate(string $identifier, string $token): array
    {
        $valid = self::where('identifier', $identifier)
                    ->where('token', $token)
                    ->first();

        if (!$valid) {
            return [
                'status' => false,
                'message' => 'invalid'
            ];
        }

        if (now() > $valid->created_at->addMinutes($valid->validity)) {
            self::where('identifier', $identifier)
                ->where('token', $token)
                ->delete();

            return [
                'status' => false,
                'message' => 'expired',
            ];
        }

        self::where('identifier', $identifier)
            ->where('token', $token)
            ->delete();

        return [
            'status' => true,
            'message' => 'valid'
        ];
    }
}
