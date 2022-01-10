<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        $body = collect($this->faker->paragraphs(rand(5, 15)))
                ->map(function($item){
                    return "<p>$item</p>";
                })->toArray();

        $body = implode($body);

        return [
            'user_id' => User::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $body,
            'is_published' => $this->faker->boolean(),
            'published_at' => Carbon::now()
        ];
    }

}
