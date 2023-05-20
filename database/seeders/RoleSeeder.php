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
            'Content Manager',
            'Moderator',
            'Editor',
            'Premium_User',
            'User',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // NOTE: Admin role bypass auth checks, see AuthServiceProvider.

        $contentManagerRole = Role::where('name', 'Content Manager')->first();
        $moderatorRole = Role::where('name', 'Moderator')->first();
        $editorRole = Role::where('name', 'Editor')->first();
        $userRole = Role::where('name', 'User')->first();

        $contentManagerPermissions = [
            'content_create',
            'content_read',
            'content_update',
            'content_delete',
            'content_view',
        ];
        $contentManagerRole->syncPermissions($contentManagerPermissions);

        $moderatorPermissions = [
            'content_read',
            'comment_create',
            'comment_update',
            'comment_delete',
        ];
        $moderatorRole->syncPermissions($moderatorPermissions);

        $editorPermissions = [
            'content_create',
            'content_update',
            'content_delete',
        ];
        $editorRole->syncPermissions($editorPermissions);

        $userPermissions = [
            'comment_create',
            'comment_update',
            'comment_delete',
        ];
        $userRole->syncPermissions($userPermissions);
    }
}
