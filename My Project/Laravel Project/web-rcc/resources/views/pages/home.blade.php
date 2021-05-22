@extends('layout.base_layout')

{{-- title --}}
@section('title')
home
@endsection

{{-- link css buat page home --}}
@section('link_css')
<link rel="stylesheet" href="{{ url('./assets/css/penyelengara.css') }}" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('./assets/css/speaker.css') }}" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('./assets/css/partner_organizations.css') }}" crossorigin="anonymous">

{{-- slickjs untuk slider partner organization ukuran mobile --}}
<link rel="stylesheet" type="text/css" href="{{ url('./assets/vendor/jquery/slickjs/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('./assets/vendor/jquery/slickjs/slick-theme.css') }}">
@endsection

{{-- content home --}}
@section('content')

@include('pages.components.home.penyelenggara')
@include('pages.components.home.keynoteSpeaker')
@include('pages.components.home.partnerOrganizations')

{{-- tampilan mobile untuk partner organization diubah menjadi slider --}}
@include('pages.components.home.partnerOrganizations_mobile')


@endsection

{{-- link js buat page home --}}
@section('link_js')
{{-- slickjs untuk slider partner organization ukuran mobile --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{ url('assets/js/slick_partnerOrganizations.js') }}" crossorigin="anonymous"></script>
<script>

</script>
@endsection