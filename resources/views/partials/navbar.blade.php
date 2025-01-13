<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('obat') ? 'active' : '' }}"
                            href="{{ route('obat') }}">Produk</a>
                    </li>
                </ul>

                @auth
                    <ul class="navbar-nav ms-auto me-5">
                        <li class="nav-item">
                            <a class="btn btn-light" href="/admin">Dashboard</a>
                        </li>
                    </ul>
                @elseif(Auth::guard('pelanggan')->check())
                    <div class="dropdown ms-auto">
                        <a href="{{ route('keranjang') }}" class="btn btn-light"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome, {{ auth()->guard('pelanggan')->user()->username }}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pembayaran') }}">Pembayaran</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <ul class="navbar-nav ms-auto me-5">
                        <li class="nav-item">
                            <a href="{{ route('keranjang') }}" class="btn btn-light"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                            <a class="btn btn-light" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
