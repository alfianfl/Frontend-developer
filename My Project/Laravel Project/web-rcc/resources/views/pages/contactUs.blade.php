@extends('layout.base_layout')

{{-- title --}}
@section('title')
Contact Us
@endsection

{{-- link css buat contact us --}}
@section('link_css')
    <link rel="stylesheet" href="{{ url('./assets/css/contact_us.css') }}"  crossorigin="anonymous">
@endsection

{{-- content contact us --}}
@section('content')
    @include('pages.components.contactUs.contact')

@endsection

{{-- link js buat page contact us--}}
@section('link_js')

@endsection