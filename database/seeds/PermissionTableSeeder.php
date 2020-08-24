<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [


            'invoice-index',
            'invoice-create',
            'invoice-edit',
            'invoice-print',
            'invoice-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
