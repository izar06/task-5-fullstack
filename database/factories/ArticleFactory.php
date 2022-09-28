<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'content' => 'lorem ipsum',
            'gambar' => 'default',
            'user_id' => 1,
            'category_id' => 1,
        ];
    }
}
