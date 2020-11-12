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
                    <a href="{{ route('manager.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}"
                        class="nav-link {{ $active == 'employee.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('employee.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('employee.profil.index') }}"
                        class="nav-link {{ $active == 'employee.index' ? 'active' : '' }}">
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
