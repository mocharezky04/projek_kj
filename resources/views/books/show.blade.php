@extends('layouts.app')

@section('content')
    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm mb-3">Kembali ke Katalog</a>

    <div class="row g-4">
        <div class="col-md-4">
            <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" class="img-fluid rounded" alt="Cover {{ $book->judul }}">
        </div>
        <div class="col-md-8">
            <h1 class="page-title fs-2">{{ $book->judul }}</h1>
            <p class="text-muted">oleh {{ $book->penulis }}</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Penerbit:</strong> {{ $book->penerbit }}</li>
                <li class="list-group-item"><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</li>
                <li class="list-group-item"><strong>ISBN:</strong> {{ $book->isbn }}</li>
                <li class="list-group-item"><strong>Stok:</strong> {{ $book->stok }}</li>
            </ul>

            <div class="card">
                <div class="card-header">Deskripsi</div>
                <div class="card-body">
                    <p class="mb-0">{{ $book->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
                </div>
            </div>

            @can('manage-books')
                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            @endcan
        </div>
    </div>
@endsection
