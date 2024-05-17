<?php

namespace Database\Factories;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'author_id' => Author::factory(),
            'genre_id' => Genre::factory(),
            'description' => $this->faker->paragraph,
            'cover_image' => $this->faker->imageUrl(),
            'published_date' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
