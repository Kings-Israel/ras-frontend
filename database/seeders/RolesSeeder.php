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
            // 'create cart',
            // 'view cart',
            // 'update cart',
            // 'delete cart',
            // 'create order',
            'view order',
            // 'delete order',
            'update order',
            // 'create product',
            'view product',
            // 'update product',
            // 'delete product',

            // Users
            'create user',
            'update user',
            'delete user',
            'view user',

            // Roles
            'view role',
            'create role',
            'update role',
            'delete role',

            // Warehouse
            'create warehouse',
            'view warehouse',
            'update warehouse',
            'delete warehouse',

            // Warehouse management
            'view warehouse product',
            'update warehouse product',
            'delete warehouse product',
            'view warehouse occupation',
            'update warehouse occupation',

            // Financier
            'create financier',
            'view financier',
            'update financier',
            'delete financier',

            // Financing
            'view financing request',
            'update financing request',

            // Inspector
            'create inspector',
            'view inspector',
            'update inspector',
            'delete inspector',

            // Inspection
            'view inspection report',
            'create inspection report',
            'update inspection report',
            'delete inspection report',

            // Stocklift
            'create stocklift request',
            'view stocklift request',
            'update stocklift request',
            'delete stocklift request',

            // Drivers
            'create delivery',
            'view delivery',
            'update delivery',
            'delete delivery',

            // Settings
            'view settings',
            'update settings',

            // Logs
            'view logs',
        ];

        // $buyer_permissions = [
        //     'create cart',
        //     'view cart',
        //     'update cart',
        //     'delete cart',
        //     'create order',
        //     'delete order',
        //     'update order',
        //     'view product',
        //     'view warehouse',
        //     'view finaciers',
        // ];

        // $vendor_permissions = [
        //     'create product',
        //     'update product',
        //     'delete product',
        //     'view warehouse',
        // ];

        $warehouse_permissions = [
            'view product',
            'view warehouse',
            'update warehouse',
            'view order',
            'create delivery',
            'view delivery',
            'update delivery',
            'delete delivery',
            'view stocklift request',
            'update stocklift request',
        ];

        $transaction_permissions = [
            'view financing request',
            'update financing request',
        ];

        $inspector_permissions = [
            'view product',
            'view warehouse',
            'view order',
            'update order',
            'create inspection report',
            'view inspection report',
            'update inspection report',
            'delete inspection report',
            'view delivery',
            'update delivery',
        ];

        $driver_permissions = [
            'view product',
            'view warehouse',
            'view order',
            'update order',
            'create delivery',
            'view delivery',
            'update delivery',
            'delete delivery',
            'create stocklift request',
            'view stocklift request',
            'update stocklift request',
            'delete stocklift request',
        ];

        $deveint_permissions = [
            'create user',
            'update user',
            'delete user',
            'view user',
            'create role',
            'update role',
            'delete role',
            'create warehouse',
            'view warehouse',
            'update warehouse',
            'delete warehouse',
            'view settings',
            'update settings',
            'view logs',
            'create delivery',
            'view delivery',
            'update delivery',
            'delete delivery',
            'create stocklift request',
            'view stocklift request',
            'update stocklift request',
            'delete stocklift request',
        ];

        $roles = ['admin', 'buyer', 'vendor', 'warehouse manager', 'financier', 'inspector', 'driver', 'deveint'];

        collect($all_permissions)->each(fn ($permission) => Permission::firstOrCreate(['name' => $permission]));

        collect($roles)->each(function ($role) use ($warehouse_permissions, $transaction_permissions, $inspector_permissions, $deveint_permissions, $driver_permissions) {
            $role = Role::firstOrCreate(['name' => $role]);
            // if ($role->name === 'vendor') {
            //     collect($vendor_permissions)->each(function ($permission) use ($role) {
            //         $role->givePermissionTo($permission);
            //     });
            // }
            // if ($role->name === 'buyer') {
            //     collect($buyer_permissions)->each(function ($permission) use ($role) {
            //         $role->givePermissionTo($permission);
            //     });
            // }
            if ($role->name === 'warehouse manager') {
                collect($warehouse_permissions)->each(function ($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role->name === 'financier') {
                collect($transaction_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role->name === 'inspector') {
                collect($inspector_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role->name === 'driver') {
                collect($driver_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role->name === 'deveint') {
                collect($deveint_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }
        });
    }
}
