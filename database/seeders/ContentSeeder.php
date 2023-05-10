<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = Content::factory(50)->create();

        foreach ($contents as $content) {
            $linkCount = rand(1, 3);
            Link::factory()->count($linkCount)->create([
                'content_id' => $content->id,
            ]);
        }
    }
}
