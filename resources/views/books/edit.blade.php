@extends('layouts.app')

@section('content')
    <h1 class="page-title fs-3 mb-3">Edit Buku</h1>

    <form method="POST" action="{{ route('books.update', $book) }}" class="card">
        @method('PUT')
        <div class="card-body">
            @include('books._form', ['submitLabel' => 'Update Buku'])
        </div>
    </form>
@endsection
