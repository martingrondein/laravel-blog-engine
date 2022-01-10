<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Category::factory(10)->create();
        Tag::factory(20)->create();

        Post::factory(50)->create();

        $posts = Post::paginate(50);

        foreach ($posts as $post) {

            $categories = Category::paginate(rand(1,9));

            foreach ($categories as $category) {
                PostCategory::firstOrCreate([
                    'post_id' => $post->id,
                    'category_id' => Category::all()->random()->id,
                ]);
            }

            $tags = Tag::paginate(rand(1,20));

            foreach ($tags as $tag) {
                PostTag::firstOrCreate([
                    'post_id' => $post->id,
                    'tag_id' => Tag::all()->random()->id,
                ]);
            }
        }


    }
}
