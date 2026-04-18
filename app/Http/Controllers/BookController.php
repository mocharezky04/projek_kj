<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->toString();

        $books = Book::query()
            ->when($search, function ($query, string $term) {
                $query->where(function ($subQuery) use ($term): void {
                    $subQuery->where('judul', 'like', "%{$term}%")
                        ->orWhere('penulis', 'like', "%{$term}%")
                        ->orWhere('isbn', 'like', "%{$term}%");
                });
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('books.index', [
            'books' => $books,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateBook($request);
        Book::create($validated);

        return redirect()->route('books.index')->with('status', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $this->validateBook($request, $book->id);
        $book->update($validated);

        return redirect()->route('books.show', $book)->with('status', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('status', 'Buku berhasil dihapus.');
    }

    private function validateBook(Request $request, ?int $bookId = null): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'digits:4', 'integer', 'between:1900,' . date('Y')],
            'isbn' => ['required', 'string', 'max:50', Rule::unique('books', 'isbn')->ignore($bookId)],
            'stok' => ['required', 'integer', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'cover' => ['nullable', 'url'],
        ]);
    }
}
