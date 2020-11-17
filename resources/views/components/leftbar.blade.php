<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <x-logo />

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- {{dd(Auth::user()->role_id)}} --}}
                @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('manajer.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li
                    class="nav-item has-treeview {{ $active == 'menu.index' || $active == 'kategori.index' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <x-icon class="nav-icon fas fa-" type="bars" />
                        <p>
                            Menu Restoran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <x-icon class="nav-icon fas fa-" type="circle" />
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('menuResto.index') }}"
                                class="nav-link {{ $active == 'menu.index' ? 'active' : '' }}">
                                <x-icon class="nav-icon fas fa-" type="circle" />
                                <p>Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('karyawan.index') }}"
                        class="nav-link {{ $active == 'karyawan.index' ? 'active' : '' }}">
                        <x-icon class="nav-icon fas fa-" type="user" />
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <x-icon class="nav-icon fas fa-" type="book" />
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pendapatan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('karyawan.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                {{-- <li class="nav-item">
                    <a href="{{ route('menu.index') }}" class="nav-link {{ $active == 'menu.index' ? 'active' : '' }}">
                <x-icon class="nav-icon fas fa-" type="bars" />
                <p>
                    Menu Restoran
                </p>
                </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('pemesanan.index') }}"
                        class="nav-link {{ $active == 'pemesanan.index' ? 'active' : '' }}">
                        <x-icon class="nav-icon fas fa-" type="bars" />
                        <p>
                            Menu Restoran
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('profil.index') }}"
                        class="nav-link {{ $active == 'profil.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
