<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(3)->create();

        $this->call([
            GenreSeeder::class,
            LinkProviderSeeder::class,
            ContentSeeder::class,
        ]);
    }
}
