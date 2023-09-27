<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self cr12()
 * @method static self business_permit()
 * @method static self tax_compliance()
 * @method static self export_permit()
 */
final class DocumentTypes extends Enum
{
    protected static function labels(): array
    {
        return [
            'cr12' => 'CR 12',
            'business_permit' => 'Business Permit',
            'export_permit' => 'Export Permit',
            'tax_compliance' => 'Tax Compliance',
        ];
    }

    protected static function values(): array
    {
        return [
            'cr12' => 'CR_12',
            'business_permit' => 'Business_Permit',
            'export_permit' => 'Export_Permit',
            'tax_compliance' => 'Tax_Compliance',
        ];
    }
}
