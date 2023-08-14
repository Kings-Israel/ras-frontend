<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
