<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['title' => 'Action', 'slug' => 'action'],
            ['title' => 'Comedy', 'slug' => 'comedy'],
            ['title' => 'Drama', 'slug' => 'drama'],
            ['title' => 'Romance', 'slug' => 'romance'],
            ['title' => 'Horror', 'slug' => 'horror'],
            ['title' => 'Sci-Fi', 'slug' => 'sci-fi'],
            ['title' => 'Thriller', 'slug' => 'thriller'],
        ];

        Genre::insert($genres);
    }
}
