<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="{{ route('admin') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/obat*') ? 'active' : '' }}" href="/admin/obat">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Obat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/penjualan*') ? 'active' : '' }}" href="/admin/penjualan">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pembelian*') ? 'active' : '' }}" href="/admin/pembelian">
                    <span data-feather="shopping-bag" class="align-text-bottom"></span>
                    Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pemasok*') ? 'active' : '' }}" href="/admin/pemasok">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Pemasok
                </a>
            </li>
        </ul>
    </div>
</nav>
