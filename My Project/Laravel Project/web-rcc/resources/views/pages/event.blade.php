@extends('layout.base_layout')

{{-- title --}}
@section('title')
Event
@endsection

{{-- link css buat event --}}
@section('link_css')
    <link rel="stylesheet" href="{{ url('./assets/css/bestOverall.css') }}"  crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('./assets/css/workshop.css') }}"  crossorigin="anonymous">
@endsection

{{-- content event --}}
@section('content')
    {{-- @include('pages.components.event.bestOverall') --}}
    @include('pages.components.event.workshop')
@endsection

{{-- link js buat page event --}}
@section('link_js')

@endsection