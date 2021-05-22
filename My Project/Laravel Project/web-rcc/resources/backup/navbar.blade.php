{{-- section partner yang diatas navbar --}}
<div class="section-partner-nav">
  <div class="thumb-partner-nav"></div>
  <div class="thumb-partner-nav"></div>
  <div class="thumb-partner-nav"></div>
</div>

{{-- navbar conference --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav  d-flex justify-content-around " style="width:100%">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/about')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Committee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Call for paper</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target=".register-modal" href="#">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Download</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Submissions</a>
      </li>
      @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
      @else
      @if(Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target=".login-modal" href="{{route('login')}}">Login</a>
      </li>
      @endif
      @endif
    </ul>
  </div>
</nav>

{{-- memanggil popup modal login dan register --}}
@include('layout.includes.login')
@include('layout.includes.register')