<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        @if (Auth::user()->role_id == 2)
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{count($data)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{count($pending)}} Order terpending</span>
                @foreach ($pending as $d)
                <form action="{{ route('cart.detail', [$d->id]) }}" method="GET">
                    @csrf
                    <button class="dropdown-item float-right" type="submit">
                        <i class="fas fa-circle mr-2"><span> {{$d->nama}}</span></i>
                        Proses
                    </button>
                </form>
                @endforeach
                <span class="dropdown-item dropdown-header">{{count($proses)}} Order Perlu dikirim</span>
                @foreach ($proses as $d)
                <form action="{{ route('cart.detail', [$d->id]) }}" method="GET">
                    @csrf
                    <button class="dropdown-item float-right" type="submit">
                        <i class="fas fa-circle mr-2"><span> {{$d->nama}}</span></i>
                        Kirim
                    </button>
                </form>
                @endforeach
            </div>
        </li>
        @endif

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2"
                    alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary mb-2">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                    <p>
                        {{ Auth::user()->name }}
                        <small>Member since {{ Auth::user()->created_at }}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                {{-- <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li> --}}
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default">Profile</a>
                    <a class="btn btn-danger float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>

</nav>
