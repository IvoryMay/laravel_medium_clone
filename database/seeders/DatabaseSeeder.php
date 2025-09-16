<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name"=> "Test User",
            "username" => "testuser", 
            "email"=> "test@example.com",
        ]);

        $categories = ["Technology",
         "Design",
            "Politics", 
             "Science",
             "Health", 
             "Style",
              "Travel"];
        foreach ($categories as $category) {
            Category::factory()->create([
                "name" => $category
            ]);
        }

        // Post::factory(20)->create();
    }
}
