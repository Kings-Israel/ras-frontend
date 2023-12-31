<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = file_get_contents('./database/seeders/countries.json');

        foreach (json_decode($cities) as $city) {
            $country = Country::firstOrCreate(
                    ['name' => $city->country],
                    [
                        'iso' => $city->iso,
                        'iso_three' => $city->iso_three
                    ],
            );

            City::firstOrcreate(
                [
                    'country_id' => $country->id,
                    'name' => $city->city,
                ],
                [
                    'latitude' => $city->latitude,
                    'longitude' => $city->longitude,
                ]
            );
        }
    }
}
