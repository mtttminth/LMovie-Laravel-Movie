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
            'admin_read',
            'premium_read',

            'user_create',
            'user_read',
            'user_update',
            'user_delete',
            'user_list',

            'permission_create',
            'permission_read',
            'permission_update',
            'permission_delete',

            'role_create',
            'role_read',
            'role_update',
            'role_delete',

            'content_create',
            'content_read',
            'content_update',
            'content_delete',

            'comment_create',
            'comment_update',
            'comment_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
