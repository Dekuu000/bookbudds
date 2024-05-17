<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Book;
use App\Models\Review;
use App\Models\RequestedBook;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // User::factory(10)->create()->each(function ($user) {
        //     UserProfile::factory()->create(['user_id' => $user->id]);
        // });

        // Author::factory(10)->create();
        // Genre::factory(10)->create();
        // Category::factory(10)->create(); // Add this line

        // Book::factory(50)->create();
        // Review::factory(100)->create();
        // RequestedBook::factory(20)->create();
    }
}
