@extends('layouts.app')

@section('content')
    <div class="section-title mb-3">
        <h1 class="page-title fs-2 mb-0">Tambah Buku Baru</h1>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>

    <form method="POST" action="{{ route('books.store') }}" class="surface-card p-4 p-md-5">
        @include('books._form', ['submitLabel' => 'Simpan Buku'])
    </form>
@endsection
