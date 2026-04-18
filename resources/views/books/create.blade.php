@extends('layouts.app')

@section('content')
    <h1 class="page-title fs-3 mb-3">Tambah Buku Baru</h1>

    <form method="POST" action="{{ route('books.store') }}" class="card">
        <div class="card-body">
            @include('books._form', ['submitLabel' => 'Simpan Buku'])
        </div>
    </form>
@endsection
