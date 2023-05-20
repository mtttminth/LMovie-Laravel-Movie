<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user_management_access',
            'user_access',
            'user_create',
            'user_read',
            'user_update',
            'user_delete',
            'user_list',
            'user_view',

            'permission_access',
            'permission_create',
            'permission_read',
            'permission_update',
            'permission_delete',

            'role_access',
            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'content_access',
            'content_create',
            'content_read',
            'content_update',
            'content_delete',
            'content_view',

            'comment_access',
            'comment_create',
            'comment_update',
            'comment_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
