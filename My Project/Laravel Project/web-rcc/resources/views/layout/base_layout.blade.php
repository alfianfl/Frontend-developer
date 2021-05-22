<!doctype html>
<html lang="en">
{{-- CATATAN CSS DAN JS YANG DI BASE LAYOUT MERUPAKAN SOURCE YANG DIPAKAI UNTUK SEMUA PAGE --}}

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font awsome --}}
    <link rel="stylesheet" href="{{ url('assets/vendor/fontawesome-free-5.15.3-web/css/all.css') }}"
        crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-4/css/bootstrap.min.css') }}" crossorigin="anonymous">
    {{-- main css  --}}
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/navbar.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/register.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/preloader.css') }}" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="{{ url('assets/vendor/jquery/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script>


    {{-- costum css --}}
    @yield('link_css')
    <title>@yield('title')</title>
    <style>
        .absolute {
            position: absolute;
            height: 1600px;
        }

        body {
            overflow: scroll
        }
    .back-to-top {
        position: fixed;
        display: none;
        right: 15px;
        bottom: 15px;
        z-index: 99999;
    }
    
    .back-to-top i {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      width: 40px;
      height: 40px;
      border-radius: 4px;
      background: #ffc451;
      color: #151515;
      transition: all 0.4s;
    }
    
    .back-to-top i:hover {
      background: #151515;
      color: #ffc451;
    }
</style>

</head>

<body>

    {{-- ISI VALUE UNTUK CERTIFICATE --}}
    <div class="loader ">   
        <div id="preloader" ></div>
    </div>
    <!-- navbar -->
    @include('layout.includes.navbar')
    <div class="main-content mb-5">
        <!-- content -->
        @yield('content')
    </div>
    {{-- <input id="names" value="Dzikri Algifari" type='text' hidden> --}}


    <!-- footer -->

    @yield('link_js')

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    {{-- <script src="{{ url('assets/vendor/jquery/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script> --}}
    <script src="{{ url('assets/vendor/bootstrap-4/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ url('assets/vendor/bootstrap-4/js/bootstrap.min.js') }}" crossorigin="anonymous">
    </script>
    {{-- handle show password --}}
    <script>
        function myFunction() {
            const x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else  {
                x.type = "password";
            } 
        }
        function regisShow1() {
            const y = document.querySelector(".password-regis");
            if(y.type === "password" ){
                y.type = "text";
              
            } else{
                y.type = "password";
            }
        }
        function regisShow() {
            const z = document.getElementById("password-confirm");
            if(z.type === "password" ){
                z.type = "text";
              
            } else{
                z.type = "password";
            }
        }
    </script>
    <!-- error validation open modal-->
    <script type="text/javascript">
        @if (session('error_register'))
        $('#register').modal('show');
        @elseif(session('error') || session('must_login'))
        $('#login').modal('show');
     @endif
    </script>

    <script type="text/javascript">
        // change to sign up
      const signup = document.getElementById('signup')
      signup.addEventListener('click', function(){
        $('.login-modal').modal('hide'); 
        $('.register-modal').modal('show').addClass('absolute');  
    
      });
       // back to signin menu
      const bsignin = document.getElementById('back-signin')
      bsignin.addEventListener('click', function(){
        $('.register-modal ').modal('hide'); 
        $('.login-modal').modal('show');  
      });

      const regis = document.querySelector('.register')
      regis.addEventListener('click', function(){
        $('.register-modal').removeClass('absolute');  
      });

    </script>
    <script>
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
</body>

</html>