<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title fs-3 mb-0">Dashboard Member</h1>
    </x-slot>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="display-6 mb-0">{{ $bookCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Member</h5>
                    <p class="display-6 mb-0">{{ $memberCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Buku Terbaru</div>
        <ul class="list-group list-group-flush">
            @forelse ($books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $book->judul }} - {{ $book->penulis }}</span>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </li>
            @empty
                <li class="list-group-item">Belum ada data buku.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
