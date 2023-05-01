<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->word.'.jpg',
            'parent_id' => null,

        ];
    }
}
