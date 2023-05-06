<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition()
    {
        $title = $this->faker->unique()->sentence(3);
        $slug = Str::slug($title);
        $user = User::first();

        return [
            'user_id' => $user->id,
            'tmdb_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'title' => $title,
            'slug' => $slug,
            'cover' => $this->faker->imageUrl(),
            'poster' => $this->faker->imageUrl(),
            'content_type' => 'movie',
            'duration' => $this->faker->time('H:i:s'),
            'trailer' => $this->faker->url,
            'release_date' => $this->faker->date(),
            'overview' => $this->faker->paragraph,
            'view' => $this->faker->numberBetween(0, 1000),
            'rating' => $this->faker->randomFloat(1, 0, 10),
            'publish' => $this->faker->boolean(),
            'feature' => $this->faker->boolean(),
            'member_only' => $this->faker->boolean(),
        ];
    }
}
