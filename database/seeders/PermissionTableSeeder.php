<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'user-access',
            'user-create',
            'user-edit',
            'user-delete',
            'role-access',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-access',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'post-access',
            'post-create',
            'post-edit',
            'post-delete',
            'category-access',
            'category-create',
            'category-edit',
            'category-delete',
            'comment-access',
            'comment-edit',
            'comment-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
