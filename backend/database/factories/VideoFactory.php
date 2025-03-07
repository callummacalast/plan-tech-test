<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'thumbnail_url' => $this->faker->url(),
            'video_url' => $this->faker->url(),
            'duration' => $this->faker->numberBetween(30, 300),
            'views' => $this->faker->numberBetween(10, 1000),
            'subscriber_count' => $this->faker->numberBetween(100, 10000),
            'live' => $this->faker->boolean(),
            'uploaded_at' => now(),
            'author' => $this->faker->name(),
        ];
    }
}
