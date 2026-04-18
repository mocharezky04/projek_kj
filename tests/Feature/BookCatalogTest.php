<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_book(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('books.store'), [
            'judul' => 'Laravel Untuk Pemula',
            'penulis' => 'Putut Widagdo',
            'penerbit' => 'Kampus Press',
            'tahun_terbit' => '2024',
            'isbn' => '9786020000001',
            'stok' => 10,
            'deskripsi' => 'Buku pengantar Laravel.',
            'cover' => 'https://placehold.co/640x480?text=Laravel',
        ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', ['judul' => 'Laravel Untuk Pemula']);
    }

    public function test_search_books_by_title_works(): void
    {
        Book::factory()->create(['judul' => 'Algoritma Dasar']);
        Book::factory()->create(['judul' => 'Basis Data Lanjut']);

        $response = $this->get(route('books.index', ['q' => 'Algoritma']));

        $response->assertOk();
        $response->assertSee('Algoritma Dasar');
        $response->assertDontSee('Basis Data Lanjut');
    }
}
