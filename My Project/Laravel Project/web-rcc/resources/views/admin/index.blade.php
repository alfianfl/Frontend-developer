@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Dashboard - Web RCC
@endsection


@section('link_css')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4" style="height:160px">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <span>{{$countUser}}</span> <br>
                                    <span>Active User</span>
                                </div>
                                <div class="thumb-img">
                                    <img width="50px" src="{{ url('./assets/img/Group.png') }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/admin/active-user')}}">More
                                    Info</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4" style="height:160px">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <span>{{$count}}</span> <br>
                                    <span>Registered Conference</span>
                                </div>
                                <div class="thumb-img">
                                    <img width="50px" src="{{ url('./assets/img/verify1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link"
                                    href="{{url('/admin/registeredConference')}}">More Info</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4" style="height:160px">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <span>{{$countAbstract}}</span> <br>
                                    <span>Submission Abstract</span>
                                </div>
                                <div class="thumb-img">
                                    <img width="50px" src="{{ url('./assets/img/copy1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/admin/abstract')}}">More
                                    Info</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4" style="height:160px">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <span>{{$countPaper}}</span> <br>
                                    <span> Submission Paper</span>
                                </div>
                                <div class="thumb-img">
                                    <img width="50px" src="{{ url('./assets/img/document1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('/admin/fullPaper')}}">More
                                    Info</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@section('link_js')
@endsection