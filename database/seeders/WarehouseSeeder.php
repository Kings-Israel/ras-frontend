<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use App\Models\UserWarehouse;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $countries = Country::with('cities')->inRandomOrder()->first();

        $warehouses = [
            [
                'name' => 'Sebuleni',
                'country_id' => $this->country()->id,
                'city_id' => $this->country()->cities->first()->id,
                'max_capacity' => '1000000',
                'occupied_capacity' => '0',
                'latitude' => '6.4554',
                'longitude' => '3.3841',
            ],
            [
                'name' => 'Cabo Stores',
                'country_id' => $this->country('Cairo')->id,
                'city_id' => $this->country()->cities->first()->id,
                'max_capacity' => '990000',
                'occupied_capacity' => '0',
                'latitude' => '30.0444',
                'longitude' => '31.2358',
            ],
            [
                'name' => 'New Stores Ltd',
                'country_id' => $this->country()->id,
                'city_id' => $this->country()->cities->first()->id,
                'max_capacity' => '300000',
                'occupied_capacity' => '0',
                'latitude' => '1.6983',
                'longitude' => '32.0778',
            ],
            [
                'name' => 'Weka Stores',
                'country_id' => $this->country()->id,
                'city_id' => $this->country()->cities->first()->id,
                'max_capacity' => '990000',
                'occupied_capacity' => '0',
                'latitude' => '-1.0396',
                'longitude' => '37.09',
            ],
        ];

        collect($warehouses)->each(function ($warehouse) {
            $new_warehouse = Warehouse::create($warehouse);

            $warehouse_managers = User::whereHas('roles', function ($query) {
                $query->whereHas('permissions', function ($query) {
                    $query->where('name', 'create warehouse')->orWhere('name', 'view warehouse')->orWhere('name', 'update warehouse');
                });
            })
            ->inRandomOrder()
            ->first();

            UserWarehouse::create([
                'warehouse_id' => $new_warehouse->id,
                'user_id' => $warehouse_managers->id
            ]);
        });
    }

    private function country()
    {
        $country = Country::with('cities')->inRandomOrder()->first();

        return $country;
    }
}
