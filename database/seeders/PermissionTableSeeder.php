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
           'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'home-list',
            'home-create',
            'home-edit',
            'home-delete',

            'about-list',
            'about-create',
            'about-edit',
            'about-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',

            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',

            'website-control',
            'dashboard-control',
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
