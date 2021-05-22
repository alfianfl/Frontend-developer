@extends('layout.base_layout')

{{-- title --}}
@section('title')
Committee
@endsection


{{-- link css buat committee --}}
@section('link_css')
    <link rel="stylesheet" href="{{ url('./assets/css/committee.css') }}"  crossorigin="anonymous">
@endsection

{{-- content commitee --}}
@section('content')
    @include('pages.components.committee.scientific')
    @include('pages.components.committee.organizatingCommittee')
@endsection

{{-- link js buat page home --}}
@section('link_js')
    <script>
        const td = document.querySelectorAll('td');
        td.forEach((x,index) => {
            if(index %2 ===0){
                x.classList.add('bg-skyblue')
            }else{
                console.log('err')
            }
        })
    </script>
@endsection