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
            'manage product',
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
            'view storage requests',

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

            // Inspection
            'view inspection request',
            'update inspection request',

            // Insurance
            'create insurance company',
            'update insurance company',
            'delete insurance company',
            'view insurance company',

            'view insurance request',
            'update insurance request',

            'view insurance report',
            'create insurance report',
            'update insurance report',
            'delete insurance report',

            // Stocklift
            'create stocklift request',
            'view stocklift request',
            'update stocklift request',
            'delete stocklift request',

            // Logistics Companies
            'create logistics company',
            'view logistics company',
            'update logistics company',
            'delete logistics company',

            // Logistics
            'create driver',
            'update driver',
            'delete driver',
            'view driver',

            // Drivers
            'create delivery',
            'view delivery',
            'update delivery',
            'delete delivery',

<<<<<<< HEAD
            //vendor
            'view vendor',
            'manage vendor',

            //buyer
            'view buyer',
=======
            'view delivery request',
            'update delivery request',
>>>>>>> 36114d49060e971098fe654632b7d1f271d87e90

            // Settings
            'view settings',
            'update settings',
            'setting document',
            'setting category',
            'setting units',
            'setting country',

            //marketing
            'manage marketing',

            //logistics
            'view logistics request',
            'view logistics report',

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
            'view buyer',
            'view storage requests',
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
            'view inspection request',
            'update inspection request',
            'view delivery',
            'update delivery',
            'view vendor',
            'view buyer'
        ];

        $insurance_permissions = [
            'view insurance request',
            'update insurance request',
            'view insurance report',
            'create insurance report',
            'update insurance report',
            'delete insurance report',
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
            'view buyer'
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
<<<<<<< HEAD
            'view vendor',
            'view buyer',
            'view logistics request',
            'view logistics report',
            'manage vendor',
            'manage product',
            'manage marketing',
            'setting document',
            'setting category',
            'setting units',
            'setting country',
            'view storage requests'
=======
            'create logistics company',
            'view logistics company',
            'update logistics company',
            'delete logistics company',
>>>>>>> 36114d49060e971098fe654632b7d1f271d87e90
        ];

        $logistics_permissions = [
            'create driver',
            'update driver',
            'delete driver',
            'view driver',
            'create stocklift request',
            'view stocklift request',
            'update stocklift request',
            'delete stocklift request',
            'view delivery request',
            'update delivery request',
        ];

        $roles = ['admin', 'buyer', 'vendor', 'warehouse manager', 'financier', 'inspector', 'driver', 'deveint', 'insurer', 'logistics'];

        collect($all_permissions)->each(fn ($permission) => Permission::firstOrCreate(['name' => $permission]));

        collect($roles)->each(function ($role) use ($warehouse_permissions, $transaction_permissions, $inspector_permissions, $deveint_permissions, $driver_permissions, $insurance_permissions, $logistics_permissions) {
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

            if ($role->name === 'insurer') {
                collect($insurance_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }

            if ($role->name === 'logistics') {
                collect($logistics_permissions)->each(function($permission) use ($role) {
                    $role->givePermissionTo($permission);
                });
            }
        });
    }
}
