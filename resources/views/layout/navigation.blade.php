<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('home')}}">
            <span class="font-weight-bold">GREY POS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{route('home')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        {{-- Transaksi --}}
        <li class="menu-item {{ request()->is('transaction') ? 'active' : '' }}">
            <a href="{{route('transaction')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Transactions">penjualan</div>
            </a>
            <!-- inventori -->
        <li class="menu-item  {{ request()->is('supplier*')|| request()->is('stok*')? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Layouts">Inventori</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{ request()->is('supplier*') ? 'active' : '' }}">
                    <a href="{{route('supplier.index')}}" class="menu-link">
                        <div data-i18n="Without navbar">supplier</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('stok*') ? 'active' : '' }}"">
            <a href=" #" class="menu-link">
                    <div data-i18n="Without navbar">stok</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- Produk --}}
        <li class="menu-item {{ request()->is('kategori*')|| request()->is('produk*')? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Account Settings">Produk</div>
            </a>
            <ul class="menu-sub">
                {{-- kategori --}}
                <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}" class="menu-link">
                        <div data-i18n="Account">kategori</div>
                    </a>
                </li>
                {{-- produk --}}
                <li class="menu-item {{ request()->is('produk*') ? 'active' : '' }}">
                    <a href="{{ route('produk.index') }}" class="menu-link">
                        <div data-i18n="Account">produk</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- user --}}
        <li class="menu-item {{ request()->is('user*')|| request()->is('acces*')? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('user') }}" class="menu-link">
                        <div data-i18n="Account">User</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Account">Hak Akses</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-line-chart-down"></i>
                <div data-i18n="Misc">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-misc-error.html" class="menu-link">
                        <div data-i18n="Error">laporan masuk</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-misc-under-maintenance.html" class="menu-link">
                        <div data-i18n="Under Maintenance">laporan keluar</div>
                    </a>
                </li>
            </ul>
            
        </li>

        

</aside>
