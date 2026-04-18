<x-guest-layout>
    <div class="auth-page-wrap p-4 p-md-5">
        <h1 class="auth-title">Daftar Member</h1>
        <p class="auth-subtitle mb-4">Buat akun baru untuk mulai akses katalog perpustakaan.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" required autofocus autocomplete="name">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="prodi" class="form-label">Program Studi (Text Input)</label>
                <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}" placeholder="Contoh: Informatika" required>
                @error('prodi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin (Radio)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender_l" value="L" {{ old('gender') === 'L' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="gender_l">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender_p" value="P" {{ old('gender') === 'P' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="gender_p">Perempuan</label>
                </div>
                @error('gender')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan (Select)</label>
                <select id="angkatan" class="form-select @error('angkatan') is-invalid @enderror" name="angkatan" required>
                    <option value="">Pilih angkatan</option>
                    @for ($year = date('Y'); $year >= 2016; $year--)
                        <option value="{{ $year }}" {{ old('angkatan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('angkatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Buat password" required autocomplete="new-password">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Ulangi password" required autocomplete="new-password">
                @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="small">Sudah punya akun?</a>
                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
            </div>
        </form>
    </div>
</x-guest-layout>
