@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Keynote Speaker
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
                <h1 class="mt-4">Tables Keynote Speaker</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/keynote/inputKeynoteSpeaker')}}"> <button class="btn btn-primary">Input
                                new Keynote Speaker</button></a>

                    </div>
                    <div class="card-body">
                        @if (session('succes_upload'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('succes_upload')}}
                        </div>
                        @elseif(session('failed_upload'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('failed_upload')}}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Institution</th>
                                        <th>Conference</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keynote as $item)

                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td><img height="310px" width="288px" src="{{url('keynote')."/".$item->image}}"
                                                alt="img" /></td>
                                        <td>{{$item->institution}}</td>
                                        <td>{{$item->conference->conference_title}}</td>
                                        <td class="text-center">
                                            <a href="{{url('admin/keynote/editKeynoteSpeaker',$item->keynote_id)}}"><i
                                                    style="color:#35C668" class="fas fa-edit"></i> </a>
                                            <i data-toggle="modal" data-target=".bd-delete-modal-admin10"
                                                style="color:#C43030" data-id="{{$item->keynote_id}}"
                                                class="fas fa-trash color-danger trash-keynote"></i>
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
{{-- MODAL DELETE --}}
<div class="modal fade bd-delete-modal-admin10" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="modal-delete-keynote" aria-hidden="true">
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
                        <form action="" id="deleteKeynote" method="POST">
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
      $('.trash-keynote').on('click',function(){
                    console.log($(this).data('id'))
                    let id = $(this).data('id')
                    $('#modal-delete-keynote').modal('show')
                    $('#modal-delete-keynote').find('#deleteKeynote').attr('action',`/admin/keynote/deleteKeynoteSpeaker/${id}`)
      });
  });
          
</script>
@endsection