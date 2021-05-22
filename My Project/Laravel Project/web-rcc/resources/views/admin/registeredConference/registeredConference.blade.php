@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Registered Conference
@endsection


@section('link_css')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid" style="overflow:scroll">
                <h1 class="mt-4">Table Registered Conference</h1>
                <div style="width: 1500px" class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Organization</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>List As</th>
                                        <th>Conference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users != null)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->user->name}}</td>
                                        <td>{{$user->user->email}}</td>
                                        <td>{{$user->user->organization}}</td>
                                        <td>{{$user->user->phone}}</td>
                                        <td>{{$user->user->address->address}}, {{$user->user->address->city}}, {{$user->user->address->state}}, {{$user->user->address->country}}, {{$user->user->address->postal_code}}</td>
                                        <td>{{$user->user->role}}</td>
                                        <td>{{$user->conference->conference_title}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        No data
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
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