<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(3);

        return [
            'name' => strtoupper($name),
            'slug' => Str::slug($name),
            'color' => $this->faker->randomElement([
                'red', 'yellow', 'green',
                'blue', 'indigo', 'purple',
                'pink', 'rose', 'teal',
                'orange', 'sky', 'lime'
            ])
        ];
    }
}
