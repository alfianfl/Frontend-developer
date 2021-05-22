@extends('layout.base_layout')

{{-- title --}}
@section('title')
Call of Paper
@endsection

{{-- link css buat call of paper --}}
@section('link_css')
    <link rel="stylesheet" href="{{ url('./assets/css/conferenceFee.css') }}"  crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('./assets/css/bank_payment.css') }}"  crossorigin="anonymous">
@endsection

{{-- content call of paper --}}
@section('content')
    @include('pages.components.callofPaper.announcement')
    @include('pages.components.callofPaper.conferenceFee')
    @include('pages.components.callofPaper.publication')
    @include('pages.components.callofPaper.bankOfPayment')
@endsection

{{-- link js buat call of paper--}}
@section('link_js')

@endsection