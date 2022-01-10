<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = collect($this->faker->paragraphs(rand(1, 2)))
                ->map(function($item){
                    return "<p>$item</p>";
                })->toArray();

        $description = implode($description);

        return [
            'name' => $this->faker->word(),
            'description' => $description

        ];
    }
}
