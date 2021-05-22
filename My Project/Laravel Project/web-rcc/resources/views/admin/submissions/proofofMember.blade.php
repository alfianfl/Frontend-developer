@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Proof Of Member
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
            <h1 class="mt-4 ml-3">Table Proof Of Member</h1>
            <div class="container-fluid" style="overflow: scroll">
                <div style="width: 1500px" class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>The Proof</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member as $item)

                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td><a class="hover-download "
                                                href="{{ route ('download.member',$item->member_id)}}"
                                                id="paymentDownload">{{$item->file_members}}</a></a>
                                        </td>
                                        <td>{{$item->role}}</td>
                                        <td>
                                            @foreach ($arrayStatusPesanan as $key =>
                                            $value)
                                            @if($item->status == $key)
                                            {{$value}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a
                                                href="{{url('/admin/proofOfMember/editProofOfMember',$item->member_id)}}"><button
                                                    class="btn btn-primary btn-sm">Edit Status</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
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