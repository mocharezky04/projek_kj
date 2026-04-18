<x-app-layout>
    <x-slot name="header">
        <div class="section-title">
            <h1 class="page-title fs-2 mb-0">Dashboard Member</h1>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-primary">Lihat Katalog</a>
        </div>
    </x-slot>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="stat-card p-4 h-100">
                <small class="text-secondary">Total Buku</small>
                <p class="stat-number">{{ $bookCount }}</p>
                <p class="mb-0 text-secondary">koleksi tersedia</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card p-4 h-100">
                <small class="text-secondary">Total Member</small>
                <p class="stat-number">{{ $memberCount }}</p>
                <p class="mb-0 text-secondary">pengguna terdaftar</p>
            </div>
        </div>
    </div>

    <div class="surface-card p-0 overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h2 class="h5 mb-0">Daftar Buku Terbaru</h2>
        </div>
        <ul class="list-group list-group-flush">
            @forelse ($books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                    <div>
                        <div class="fw-semibold">{{ $book->judul }}</div>
                        <small class="text-secondary">{{ $book->penulis }} - {{ $book->tahun_terbit }}</small>
                    </div>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </li>
            @empty
                <li class="list-group-item py-4 text-center text-secondary">Belum ada data buku.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
