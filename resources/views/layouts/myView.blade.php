<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPEKA') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        @livewireScripts
        {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
            data-turbolinks-eval="false"></script> --}}
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <script src="{{ mix('js/app.js') }}"></script>

        @stack('css')
        @stack('style')

        <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    </head>

    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <x-navbar />
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <x-leftbar :active="$active" />

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <x-header :title="$title" :subtitle="$subtitle">
                    {{ucfirst($title)}}
                </x-header>

                <!-- Main content -->
                <section class="content">
                    <!-- flash message -->
                    <x-container>
                        <x-success-msg />
                        <x-error-msg />
                        {{ isset($slot) ? $slot : null }}
                        @yield('content')
                    </x-container>
                </section> <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <x-footer />

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

        @stack('js')
        @stack('script')

    </body>

</html>
