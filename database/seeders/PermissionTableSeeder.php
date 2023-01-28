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
            'user_access',
            'user_create',
            'user_edit',
            'user_delete',
            'role_access',
            'role_create',
            'role_edit',
            'role_delete',
            'permission_access',
            'permission_create',
            'permission_edit',
            'permission_delete',
            'post_access',
            'post_create',
            'post_edit',
            'post_delete',
            'category_access',
            'category_create',
            'category_edit',
            'category_delete',
            'tag_access',
            'tag_create',
            'tag_edit',
            'tag_delete',
            'comment_access',
            'comment_edit',
            'comment_delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
