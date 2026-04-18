@extends('layouts.app')

@section('content')
    <div class="section-title mb-3">
        <h1 class="page-title fs-2 mb-0">Detail Buku</h1>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">Kembali ke Katalog</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" class="img-fluid rounded-4 shadow-sm" alt="Cover {{ $book->judul }}">
        </div>

        <div class="col-lg-8">
            <h2 class="page-title fs-1 mb-2">{{ $book->judul }}</h2>
            <p class="text-muted mb-3">oleh {{ $book->penulis }}</p>

            <div class="row g-2 mb-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="detail-stat h-100">
                        <span class="label">Penerbit</span>
                        <span class="value">{{ $book->penerbit }}</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="detail-stat h-100">
                        <span class="label">Tahun Terbit</span>
                        <span class="value">{{ $book->tahun_terbit }}</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="detail-stat h-100">
                        <span class="label">ISBN</span>
                        <span class="value">{{ $book->isbn }}</span>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="detail-stat h-100">
                        <span class="label">Stok</span>
                        <span class="value">{{ $book->stok }} Buku</span>
                    </div>
                </div>
            </div>

            <div class="surface-card p-4">
                <h3 class="h5 mb-2">Deskripsi</h3>
                <p class="mb-0 text-secondary">{{ $book->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
            </div>

            @can('manage-books')
                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit Buku</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus Buku</button>
                    </form>
                </div>
            @endcan
        </div>
    </div>
@endsection
