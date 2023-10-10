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
        $warehouse_managers = User::whereHas('roles', function ($query) {
            $query->where('name', 'warehouse manager');
        })->inRandomOrder()->first();

        $countries = Country::with('cities')->inRandomOrder()->first();

        $warehouses = [
            [
                'name' => 'Sebuleni',
                'country_id' => $countries->id,
                'city_id' => $countries->cities()->first()->id,
                'max_capacity' => '1000000',
                'occupied_capacity' => '0'
            ],
            [
                'name' => 'Cabo Stores',
                'country_id' => $countries->id,
                'city_id' => $countries->cities()->first()->id,
                'max_capacity' => '990000',
                'occupied_capacity' => '0'
            ],
        ];

        collect($warehouses)->each(function ($warehouse) use ($warehouse_managers) {
            $new_warehouse = Warehouse::create($warehouse);
            UserWarehouse::create([
                'warehouse_id' => $new_warehouse->id,
                'user_id' => $warehouse_managers->id
            ]);
        });
    }
}
