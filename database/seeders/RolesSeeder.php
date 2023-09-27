<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_permissions = [
            'create cart',
            'view cart',
            'update cart',
            'delete cart',
            'create order',
            'view order',
            'delete order',
            'update order',
            'create product',
            'view product',
            'update product',
            'delete product',
            'create warehouse',
            'view warehouse',
            'update warehouse',
            'delete warehouse',
            'create financier',
            'view finaciers',
            'update finacier',
            'delete finacier',
        ];

        $buyer_permissions = [
            'create cart',
            'view cart',
            'update cart',
            'delete cart',
            'create order',
            'delete order',
            'update order',
            'view product',
            'view warehouse',
            'view finaciers',
        ];

        $vendor_permissions = [
            'create product',
            'update product',
            'delete product',
            'view warehouse',
        ];

        $warehouse_permissions = [
            'view product',
            'view warehouse',
            'update warehouse',
            'view order',
        ];

        $transaction_permissions = [
            'create transaction',
            'view transaction',
            'update transaction',
            'delete transaction'
        ];

        $roles = ['admin', 'buyer', 'vendor', 'warehouse manager', 'finance manager'];

        collect($all_permissions)->each(fn ($permission) => Permission::firstOrCreate(['name' => $permission]));

        collect($roles)->each(function ($role) use ($warehouse_permissions, $vendor_permissions, $buyer_permissions, $transaction_permissions){
            $role = Role::firstOrCreate(['name' => $role]);
            if ($role->name === 'vendor') {
                collect($vendor_permissions)->each(function ($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }
            if ($role->name === 'buyer') {
                collect($buyer_permissions)->each(function ($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }
            if ($role->name === 'warehouse manager') {
                collect($warehouse_permissions)->each(function ($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role == 'finance manager') {
                collect($transaction_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }
        });
    }
}
