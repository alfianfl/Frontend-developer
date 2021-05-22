@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Data User
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
                <h1 class="mt-4">Table Data User</h1>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users != null)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->organization}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address->address}}, {{$user->address->city}}, {{$user->address->state}}, {{$user->address->country}}, {{$user->address->postal_code}}</td>
                                        <td>{{$user->role}}</td>
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