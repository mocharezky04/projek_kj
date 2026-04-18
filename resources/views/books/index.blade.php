@extends('layouts.app')

@section('content')
    <div class="section-title mb-3">
        <h1 class="page-title fs-2 mb-0">Katalog Buku</h1>
        @can('manage-books')
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        @endcan
    </div>

    <div class="search-panel p-3 p-md-4 mb-4">
        <form method="GET" action="{{ route('books.index') }}" class="row g-2 align-items-center">
            <div class="col-md-9">
                <label for="q" class="form-label mb-1">Cari Koleksi Buku</label>
                <input id="q" type="text" name="q" class="form-control" value="{{ $search }}" placeholder="Cari judul, penulis, atau ISBN...">
            </div>
            <div class="col-md-3 d-grid">
                <label class="form-label d-none d-md-block">&nbsp;</label>
                <button type="submit" class="btn btn-outline-primary">Cari Buku</button>
            </div>
        </form>
    </div>

    <div class="row g-3 book-grid">
        @forelse ($books as $book)
            <div class="col-12 col-md-6 col-xl-3 book-item">
                <div class="card book-card h-100">
                    <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" alt="Cover {{ $book->judul }}" class="book-cover card-img-top" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">{{ $book->judul }}</h5>
                        <p class="text-muted small mb-2">{{ $book->penulis }} - {{ $book->tahun_terbit }}</p>

                        <div class="mb-3">
                            <span class="stock-badge">Stok Tersedia: {{ $book->stok }}</span>
                        </div>

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
                <div class="empty-state p-4 text-center">
                    Tidak ada buku yang cocok dengan pencarianmu. Coba kata kunci lain atau cek kembali ejaan.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $books->links() }}
    </div>
@endsection
