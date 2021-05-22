@extends('layout.base_layout')

{{-- title --}}
@section('title')
About Us
@endsection

{{-- link css buat page About Us --}}
@section('link_css')
    <link rel="stylesheet" href="{{ url('./assets/css/conference.css') }}"  crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('./assets/css/partner_organizations.css') }}"  crossorigin="anonymous">

    {{-- slickjs untuk slider partner organization ukuran mobile --}}
    <link rel="stylesheet" type="text/css" href="{{ url('./assets/vendor/jquery/slickjs/slick.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{ url('./assets/vendor/jquery/slickjs/slick-theme.css') }}">
@endsection

{{-- content About Us --}}
@section('content')
    @include('pages.components.about.conference')

    {{-- menggunakan component blade partner organizations dari page home --}}
    @include('pages.components.home.partnerOrganizations')
    {{-- tampilan mobile untuk partner organization diubah menjadi slider --}}
    @include('pages.components.home.partnerOrganizations_mobile')

    @include('pages.components.about.conferenceScope')
@endsection

{{-- link js buat page About Us --}}
@section('link_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ url('assets/js/slick_partnerOrganizations.js') }}" crossorigin="anonymous"></script>
@endsection

