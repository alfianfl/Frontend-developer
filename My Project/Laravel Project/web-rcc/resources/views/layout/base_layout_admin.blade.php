<!doctype html>
<html lang="en">

{{-- CATATAN CSS DAN JS YANG DI BASE LAYOUT MERUPAKAN SOURCE YANG DIPAKAI UNTUK SEMUA PAGE --}}

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- main css  --}}
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" crossorigin="anonymous">

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> --}}
    <script type="text/javascript" src="{{ url('assets/vendor/jquery/jquery-3.6.0.min.js') }}" crossorigin="anonymous">
    </script>
    @yield('link_css')
    <title>@yield('title')</title>
    <style>
        .fa-trash:hover,
        .fa-edit:hover {
            cursor: pointer;
        }
    </style>
</head>


<title>@yield('title')</title>
</head>

<body>

    <!-- navbar -->
    @include('layout.includes.navbar_admin')

    <!-- content -->
    @yield('content')

    {{-- footer --}}
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Web RCC 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    @yield('link_js')




    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('assets/vendor/bootstrap-4/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>


    <script src="{{url('assets/js/scripts.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script src="{{url('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>