@extends('layouts.app')

@section('content')
    <section class="hero-section p-4 p-md-5 mb-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold mb-3">Simulasi Perpustakaan Digital Kampus</h1>
                <p class="lead mb-4">Platform katalog buku berbasis Laravel MVC untuk manajemen akses user member/admin dan eksplorasi koleksi secara modern.</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('books.index') }}" class="btn btn-warning btn-lg">Jelajahi Katalog</a>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar Member</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">Masuk Dashboard</a>
                    @endguest
                </div>
            </div>
            <div class="col-lg-5">
                <div class="surface-card p-4">
                    <h3 class="h4 mb-3">Ringkasan Sistem</h3>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stat-card p-3 h-100">
                                <small class="text-secondary">Total Buku</small>
                                <p class="stat-number">{{ $bookCount }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card p-3 h-100">
                                <small class="text-secondary">Member Aktif</small>
                                <p class="stat-number">{{ $memberCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-title mb-3">
            <h2 class="page-title fs-2 mb-0">Buku Terbaru</h2>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>

        <div class="row g-3 book-grid">
            @forelse ($latestBooks as $book)
                <div class="col-12 col-sm-6 col-lg-4 book-item">
                    <div class="card book-card h-100">
                        <img src="{{ $book->cover ?: 'https://placehold.co/640x480?text=No+Cover' }}" class="book-cover card-img-top" alt="Cover {{ $book->judul }}" loading="lazy">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">{{ $book->judul }}</h5>
                            <p class="text-muted mb-2">{{ $book->penulis }} - {{ $book->tahun_terbit }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="stock-badge">Stok: {{ $book->stok }}</span>
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state p-4 text-center">Belum ada data buku. Login admin untuk menambahkan koleksi pertama.</div>
                </div>
            @endforelse
        </div>
    </section>

    <p class="footer-note mt-5 mb-0">Tugas 1 PBW - Laravel MVC - Tema Perpustakaan Digital</p>
@endsection
