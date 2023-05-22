<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $admin->assignRole('Admin');

        $moderator = User::factory()->create([
            'name' => 'mod',
            'email' => 'mod@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $moderator->assignRole('Moderator');

        $contentManager = User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $contentManager->assignRole('Content Manager');

        $editor = User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $editor->assignRole('Editor');

        $premiumUser = User::factory()->create([
            'name' => 'premium',
            'email' => 'premium@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $premiumUser->assignRole('Premium User');
    }
}
