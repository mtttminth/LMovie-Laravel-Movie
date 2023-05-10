<?php

namespace Database\Seeders;

use App\Models\LinkProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkProviderSeeder extends Seeder
{
    public function run(): void
    {
        $linkProviders = [
            ['title' => 'StreamSB', 'slug' => 'stream-sb'],
            ['title' => 'Vimeo', 'slug' => 'vimeo'],
            ['title' => 'Workupload', 'slug' => 'workupload'],
            ['title' => 'Google Drive', 'slug' => 'google-drive'],
            ['title' => 'Cincopa', 'slug' => 'cincopa'],
            ['title' => 'Dacast', 'slug' => 'dacast'],
            ['title' => 'GoFile', 'slug' => 'gofile'],
            // Add more link providers as needed
        ];

        LinkProvider::insert($linkProviders);
    }
}
