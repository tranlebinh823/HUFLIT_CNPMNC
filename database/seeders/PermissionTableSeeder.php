<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-show',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-show',

            'subcategory-list',
            'subcategory-create',
            'subcategory-edit',
            'subcategory-delete',
            'subcategory-show',


            'dashboard-list',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
