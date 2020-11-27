<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <style>
            .container {
                width: 300px;
            }

            .header {
                margin: 0;
                text-align: center;
            }

            h2,
            p {
                margin: 0;
            }

            .flex-container-1 {
                display: flex;
                margin-top: 10px;
            }

            .flex-container-1>div {
                text-align: left;
            }

            .flex-container-1 .right {
                text-align: right;
                width: 200px;
            }

            .flex-container-1 .left {
                width: 100px;
            }

            .flex-container {
                width: 300px;
                display: flex;
            }

            .flex-container>div {
                -ms-flex: 1;
                /* IE 10 */
                flex: 1;
            }

            ul {
                display: contents;
            }

            ul li {
                display: block;
            }

            hr {
                border-style: dashed;
            }

            /* a {
                text-decoration: none;
                text-align: center;
                padding: 10px;
                background: #00e676;
                border-radius: 5px;
                color: white;
                font-weight: bold;
            } */
        </style>
        @livewireStyles

        <!-- Scripts -->
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    </head>

    <body>
        <x-div class="container">
            <x-div class="header" style="margin-bottom: 30px;">
                <h2>SIPEKA</h2>
                <small>Ini Alamatnya</small>
            </x-div>
            <hr>
            {{$slot}}
            <hr>
            <center>
                <a href="{{ route('pemesanan.index') }}">----Click Me-----</a>
            </center>

        </x-div>

        {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('dist/js/demo.js') }}"></script> --}}

        @stack('js')
        @stack('script')
    </body>

</html>
