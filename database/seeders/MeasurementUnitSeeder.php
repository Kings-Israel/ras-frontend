<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'Kilogram(s)',
                'abbrev' => 'Kg(s)'
            ],
            [
                'name' => 'Gram(s)',
                'abbrev' => 'g(s)'
            ],
            [
                'name' => 'Litre(s)',
                'abbrev' => 'l',
            ],
            [
                'name' => 'Millimeter(s)',
                'abbrev' => 'mm',
            ],
            [
                'name' => 'Centimeter(s)',
                'abbrev' => 'cm',
            ],
            [
                'name' => 'Meter(s)',
                'abbrev' => 'm',
            ],
            [
                'name' => 'Item(s)',
                'abbrev' => '',
            ],
        ];

        collect($units)->each(function ($unit) {
            MeasurementUnit::create([
                'name' => $unit['name'],
                'abbrev' => $unit['abbrev'] != '' ? $unit['abbrev'] : NULL,
            ]);
        });
    }
}
