@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Partner Organization
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
                <h1 class="mt-4">Tables Partner Organization</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/partnerOrganization/createPartnerOrganization')}}"> <button
                                class="btn btn-primary">Input new Partner Organization</button></a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('success_message'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('success_message')}}
                            </div>
                            @endif
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Address</th>
                                        <th>Conference</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <div class="d-none">
                                    {{$itr = 0}}
                                </div>
                                <tbody>

                                    @foreach ($p_os as $p_o)
                                    <tr>
                                        <td>{{$p_o->partner_name}}</td>
                                        <td><img width="100px" height="100px"
                                                src="{{asset("assets/img/logouniv/{$p_o->partner_picture}")}}"
                                                alt="img" /></td>
                                        <td>{{$p_o->address_organization}}</td>
                                        <td>{{$conference_title[$itr]}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.partnerOrganization.edit', $p_o->partner_id)}}"><i
                                                    style="color:#35C668" class="fas fa-edit"></i> </a>

                                            <i data-toggle="modal" data-id="{{$p_o->partner_id}}"
                                                data-target=".bd-delete-modal-admin11" style="color:#C43030"
                                                class="fas fa-trash color-danger trash-partner"></i>

                                        </td>
                                    </tr>
                                    <div class="d-none">
                                        {{$itr = $itr+1}}
                                    </div>
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
{{-- MODAL DELETE --}}
<div class="modal fade bd-delete-modal-admin11" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="modal-delete-partner" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content px-3 pt-2 pb-4 ">
            <div class="modal-title">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center text-delete" style="font-size:20px">
                Delete
            </h1>
            <h1 class="text-center mt-3 font-weight-normal" style="font-size:15px">
                Are you sure you want to delete?
            </h1>
            <div class="mt-3">
                <div class="d-flex justify-content-around">
                    <div class="button w-50 mx-3">
                        <button data-dismiss="modal" type="button"
                            class="btn btn-delete btn-secondary w-100">Keep</button>
                    </div>
                    <div class="button w-50 mx-3">
                        <form action="" id="deletePartner" method="POST">
                            @csrf
                            {{method_field('delete')}}
                            <a href="">
                                <button class="btn btn-delete btn-danger w-100">Delete</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('link_js')
<script>
    $( document ).ready(function() {
      $('.trash-partner').on('click',function(){
                    let id = $(this).data('id')
                    $('#modal-delete-partner').modal('show')
                    $('#modal-delete-partner').find('#deletePartner').attr('action',`/admin/partnerOrganization/deletePartnerOrganization/${id}`)
      });
  });
</script>
@endsection