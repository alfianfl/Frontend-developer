<div class="d-flex flex-column">
  {{-- section partner yang diatas navbar --}}
  <div class="section-partner-nav" >
    <div class="thumb-partner-nav-head  d-flex justify-content-center"><img src="{{'../assets/img/logo_hmi.png'}}" alt="logo3"/></div>
    <div  class="thumb-partner-nav-head  d-flex justify-content-center"><img src="{{'../assets/img/logo-unpad1.png'}}" alt="logo2"/></div>
    <div class="thumb-partner-nav-head d-flex justify-content-center"><img src="{{'../assets/img/IORA.png'}}" alt="logo"/></div>
  </div>
  
  {{-- navbar conference --}}
  <header class="header " >
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu ">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/unpad-icocome2021')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/aboutUs')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/committee')}}">Committee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/FullPaper')}}">Call for paper</a>
      </li>
      @if(Auth::check())
      @else
      <li class="nav-item">
        <a class="nav-link register" data-toggle="modal" data-target=".register-modal" href="#">Registration</a>
      </li>
      @endif
  
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/event')}}">Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/download')}}">Download</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/contactUs')}}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/unpad-icocome2021/submissionsParticipant')}}">Submissions</a>
      </li>
  
      {{-- @dizkal ini submissions untuk yang non participant --}}
      {{-- <li class="nav-item">
          <a class="nav-link" href="{{url('/submissions non participant')}}">Submissions</a>
      </li> --}}
      @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route ('logout')}}">Logout</a>
      </li>
      @else
      <li class="nav-item" data-toggle="modal" data-target=".login-modal">
        <a class="nav-link" href="#">Login</a>
      </li>
      @endif
    </ul>
  </header>
  
</div>
{{-- memanggil popup modal login dan register --}}
@include('layout.includes.login')
@include('layout.includes.register')