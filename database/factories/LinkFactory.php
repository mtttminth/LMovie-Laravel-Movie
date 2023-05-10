<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\Link;
use App\Models\LinkProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition(): array
    {
        $linkProviders = LinkProvider::pluck('title')->toArray();
        $linkTypes = ['free', 'premium', 'download'];

        return [
            'content_id' => Content::factory(),
            'link_provider' => $this->faker->randomElement($linkProviders),
            'link_type' => $this->faker->randomElement($linkTypes),
            'link_url' => $this->faker->url,
        ];
    }
}
