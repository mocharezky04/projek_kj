@extends('layouts.app')

@section('content')
    <div class="section-title mb-3">
        <h1 class="page-title fs-2 mb-0">Edit Data Buku</h1>
        <a href="{{ route('books.show', $book) }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>

    <form method="POST" action="{{ route('books.update', $book) }}" class="surface-card p-4 p-md-5">
        @method('PUT')
        @include('books._form', ['submitLabel' => 'Update Buku'])
    </form>
@endsection
