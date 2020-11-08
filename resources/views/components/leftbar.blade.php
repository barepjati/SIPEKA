<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <x-logo />

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                {{-- <li
                    class="nav-item has-treeview {{ request()->is('kriteria') || request()->is('alternatif') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data Sapi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('kriteria') }}"
                            class="nav-link {{ request()->is('kriteria') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alternatif') }}"
                            class="nav-link {{ request()->is('alternatif') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alternatif</p>
                        </a>
                    </li>
                </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}"
                        class="nav-link {{ $active == 'employee.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Kontak
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                {{-- <li class="nav-item">
                    <a href="{{ route('post') }}" class="nav-link {{ request()->is('post') ? 'active' : '' }}">
                <i class="nav-icon fas fa-blog"></i>
                <p>
                    Post
                </p>
                </a>
                </li> --}}
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
