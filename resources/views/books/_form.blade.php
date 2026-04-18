@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label for="judul" class="form-label">Judul</label>
        <input id="judul" type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $book->judul ?? '') }}" required>
        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="penulis" class="form-label">Penulis</label>
        <input id="penulis" type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $book->penulis ?? '') }}" required>
        @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input id="penerbit" type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ old('penerbit', $book->penerbit ?? '') }}" required>
        @error('penerbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input id="tahun_terbit" type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', $book->tahun_terbit ?? '') }}" min="1900" max="{{ date('Y') }}" required>
        @error('tahun_terbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label for="stok" class="form-label">Stok</label>
        <input id="stok" type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $book->stok ?? 0) }}" min="0" required>
        @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="isbn" class="form-label">ISBN</label>
        <input id="isbn" type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn', $book->isbn ?? '') }}" required>
        @error('isbn')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="cover" class="form-label">URL Cover (opsional)</label>
        <input id="cover" type="url" name="cover" class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover', $book->cover ?? '') }}">
        @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $book->deskripsi ?? '') }}</textarea>
        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="d-flex justify-content-end mt-3 gap-2">
    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
</div>
