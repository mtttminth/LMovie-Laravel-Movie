<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Moderator',
            'Content Manager',
            'Editor',
            'Premium User',
            'User',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // NOTE: Admin role bypass auth checks, see AuthServiceProvider.

        $moderatorRole = Role::where('name', 'Moderator')->first();
        $contentManagerRole = Role::where('name', 'Content Manager')->first();
        $editorRole = Role::where('name', 'Editor')->first();
        $premiumUserRole = Role::where('name', 'Premium User')->first();
        $userRole = Role::where('name', 'User')->first();

        $moderatorPermissions = [
            'admin_read',
            'premium_read',
            'user_create',
            'user_read',
            'user_update',
            'user_delete',
            'user_list',
            'comment_create',
            'comment_update',
            'comment_delete',
        ];
        $moderatorRole->syncPermissions($moderatorPermissions);

        $contentManagerPermissions = [
            'admin_read',
            'premium_read',
            'content_create',
            'content_read',
            'content_update',
            'content_delete',
        ];
        $contentManagerRole->syncPermissions($contentManagerPermissions);

        $editorPermissions = [
            'admin_read',
            'premium_read',
            'content_create',
            'content_read',
            'content_update',
            'content_delete',
        ];
        $editorRole->syncPermissions($editorPermissions);

        $premiumUserPermissions = [
            'premium_read',
            'comment_create',
            'comment_update',
            'comment_delete',
        ];
        $premiumUserRole->syncPermissions($premiumUserPermissions);

        $userPermissions = [
            'comment_create',
            'comment_update',
            'comment_delete',
        ];
        $userRole->syncPermissions($userPermissions);
    }
}
