<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(3),
            'penulis' => fake()->name(),
            'penerbit' => fake()->company(),
            'tahun_terbit' => fake()->numberBetween(1998, (int) date('Y')),
            'isbn' => fake()->unique()->isbn13(),
            'stok' => fake()->numberBetween(0, 30),
            'deskripsi' => fake()->paragraph(),
            'cover' => fake()->optional()->imageUrl(480, 640, 'books', true),
        ];
    }
}
