<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory([
            'first_name' => 'Real African Sources',
            'last_name' => 'Admin',
            'email' => 'admin@ras.com',
        ])->create();

        $admin->assignRole('admin');

        $warehouse = User::factory()->create([
            'first_name' => 'Warehouse',
            'last_name' => 'Manager',
            'email' => 'warehouse@ras.com',
        ]);

        $warehouse->assignRole('warehouse manager');

        $finance = User::factory()->create([
            'first_name' => 'Financial',
            'last_name' => 'Manager',
            'email' => 'finance@ras.com',
        ]);

        $finance->assignRole('financier');

        $inspector = User::factory()->create([
            'first_name' => 'Inspector',
            'last_name' => 'Manager',
            'email' => 'inspector@ras.com',
        ]);

        $inspector->assignRole('inspector');

        $user = User::factory()
            ->create([
                'email' => 'buyer@ras.com',
                'phone_number' => '0700000033'
            ]);

        $user->assignRole('buyer');

        $user = User::factory()
            ->create([
                'email' => 'vendor@ras.com',
                'phone_number' => '0700000037'
            ]);

        $user->assignRole('vendor');

        $user = User::factory()
                ->create([
                    'email' => 'admin@deveint.com',
                    'phone_number' => '0700004337'
                ]);

        $user->assignRole('deveint');

        $user = User::factory()
                ->create([
                    'email' => 'driver@ras.com',
                    'phone_number' => '0700104337',
                ]);

        $user->assignRole('driver');
    }
}
