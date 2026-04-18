<nav class="navbar navbar-expand-lg nav-main sticky-top">
    <div class="container py-1">
        <a class="navbar-brand brand-title" href="{{ route('home') }}">Perpustakaan Digital</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Katalog Buku</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endauth
            </ul>

            <div class="d-flex align-items-center gap-2">
                @auth
                    @can('manage-books')
                        <a href="{{ route('books.create') }}" class="btn btn-sm btn-light text-primary">Tambah Buku</a>
                    @endcan
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-light">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-light text-primary">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
