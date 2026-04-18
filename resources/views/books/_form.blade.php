@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label for="judul" class="form-label">Judul Buku</label>
        <input id="judul" type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $book->judul ?? '') }}" placeholder="Contoh: Pemrograman Web Modern" required>
        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="penulis" class="form-label">Nama Penulis</label>
        <input id="penulis" type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $book->penulis ?? '') }}" placeholder="Contoh: Putut Widagdo" required>
        @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input id="penerbit" type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ old('penerbit', $book->penerbit ?? '') }}" placeholder="Contoh: Kampus Press" required>
        @error('penerbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input id="tahun_terbit" type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', $book->tahun_terbit ?? '') }}" min="1900" max="{{ date('Y') }}" placeholder="2024" required>
        @error('tahun_terbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label for="stok" class="form-label">Stok Buku</label>
        <input id="stok" type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $book->stok ?? 0) }}" min="0" placeholder="10" required>
        @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="isbn" class="form-label">Nomor ISBN</label>
        <input id="isbn" type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn', $book->isbn ?? '') }}" placeholder="978xxxxxxxxxx" required>
        @error('isbn')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="cover" class="form-label">URL Cover (Opsional)</label>
        <input id="cover" type="url" name="cover" class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover', $book->cover ?? '') }}" placeholder="https://...">
        @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi Buku</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan ringkasan atau gambaran isi buku...">{{ old('deskripsi', $book->deskripsi ?? '') }}</textarea>
        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<hr class="my-4">

<div class="d-flex justify-content-end gap-2 flex-wrap">
    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
</div>
