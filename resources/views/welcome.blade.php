@extends('layouts.app')

@section('content')
    <section class="hero-section p-4 p-md-5 mb-4">
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <h1 class="display-6 fw-bold">Simulasi Perpustakaan Digital Kampus</h1>
                <p class="mb-4">Kelola katalog buku, akses user member/admin, dan tampilkan informasi perpustakaan dalam satu aplikasi Laravel MVC.</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('books.index') }}" class="btn btn-warning btn-lg">Jelajahi Katalog</a>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar Member</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">Masuk Dashboard</a>
                    @endguest
                </div>
            </div>
            <div class="col-md-5">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="mb-3">Ringkasan Sistem</h5>
                        <p class="mb-2"><strong>{{ $bookCount }}</strong> buku terdaftar</p>
                        <p class="mb-0"><strong>{{ $memberCount }}</strong> member aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <h2 class="page-title fs-3 mb-3">Buku Terbaru</h2>
        <div class="row g-3">
            @forelse ($latestBooks as $book)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card book-card h-100">
                        <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" class="book-cover card-img-top" alt="Cover {{ $book->judul }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <p class="text-muted mb-2">{{ $book->penulis }} - {{ $book->tahun_terbit }}</p>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada data buku. Tambahkan dari akun admin.</div>
                </div>
            @endforelse
        </div>
    </section>

    <p class="footer-note">Tugas 1 PBW - Laravel MVC - Tema Perpustakaan Digital</p>
@endsection
