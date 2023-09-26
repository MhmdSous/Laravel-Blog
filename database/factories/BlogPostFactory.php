<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_ar' => $this->faker->sentence, //Generates a fake sentence
            'title_en' => $this->faker->sentence, //Generates a fake sentence
            'body_ar' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'body_en' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'image' => $this->faker->imageUrl(), //generates fake image url
            'user_id' => User::factory() //Generates a User from factory and extracts id

        ];
    }
}
