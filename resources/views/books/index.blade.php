@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title fs-3 mb-0">Katalog Buku</h1>
        @can('manage-books')
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        @endcan
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="row g-2 mb-4">
        <div class="col-md-9">
            <input type="text" name="q" class="form-control" value="{{ $search }}" placeholder="Cari judul, penulis, atau ISBN...">
        </div>
        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </div>
    </form>

    <div class="row g-3">
        @forelse ($books as $book)
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card book-card h-100">
                    <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" alt="Cover {{ $book->judul }}" class="book-cover card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $book->judul }}</h5>
                        <p class="text-muted small mb-2">{{ $book->penulis }}</p>
                        <p class="mb-3">Stok: {{ $book->stok }}</p>
                        <div class="mt-auto d-flex gap-2 flex-wrap">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            @can('manage-books')
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada data buku.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
@endsection
