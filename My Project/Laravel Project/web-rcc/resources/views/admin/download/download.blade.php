@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Download
@endsection


@section('link_css')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url('./assets/css/downloadAdmin.css') }}" crossorigin="anonymous">
@endsection

@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="thumb-certificate py-2 px-2">
                            <div>
                                <strong>Certificate Status</strong>
                            </div>
                            <div class="form-group my-auto">
                                <form class="d-flex w-100" action="{{route('admin.certificate',$certificate->id)}}" method="POST">
                                    @csrf
                                    <select name="status" class="custom-select  mr-2">
                                        @if($certificate->status == "on")
                                        <option value="{{$certificate->status}}">
                                            {{$certificate->status}}</option>
                                        <option value="off">Off</option>
                                        @elseif($certificate->status == "off")
                                        <option value="{{$certificate->status}}">
                                            {{$certificate->status}}</option>
                                        <option value="on">on</option>



                                        @endif
                                    </select>
                                    {{-- @if($certificate->status == 'on')
                                    <input type="checkbox" value="" name="onoffswitch" class="onoffswitch-checkbox"
                                        id="myonoffswitch" tabindex="0" checked>
                                    <label class="onoffswitch-label" for="myonoffswitch">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>

                                    @else
                                    <input type="checkbox" value="" name="onoffswitch" class="onoffswitch-checkbox"
                                        id="myonoffswitch" tabindex="0">
                                    <label class="onoffswitch-label" for="myonoffswitch">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                    @endif --}}
                                    <div class="button-submit">
                                        <button class="btn btn-success">Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mt-4">Tables Download</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/download/createDownload')}}"> <button class="btn btn-primary">Input new
                                Template</button></a>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success_message')}}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>File Upload</th>
                                        <th>Conference</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                    <tr>
                                        <td>{{$template->title}}</td>
                                        <td><a
                                                href="{{route('download.template', $template->file_name)}}">{{$template->file_name}}</a>
                                        </td>
                                        <td>{{$template->conference->conference_title}}</td>
                                        <td class="text-center">
                                            <a href="{{url('/admin/download/editDownload', $template->id)}}"><i
                                                    style="color:#35C668" class="fas fa-edit"></i> </a>
                                            <i data-toggle="modal" data-id="{{$template->id}}"
                                                data-target=".bd-delete-modal-admin2" style="color:#C43030"
                                                class="fas fa-trash color-danger trash-download"></i>
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
{{-- POP UP DELETE --}}
<div class="modal fade bd-delete-modal-admin2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="modal-delete-download" aria-hidden="true">
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
                        <form class="d-inline" action="" method="POST" id="deleteDownload">
                            {{ csrf_field() }}
                            {{method_field('delete')}}
                            <a href="">
                                <button name="submit" type="submit"
                                    class="btn btn-delete btn-danger w-100">Delete</button>
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
        var switchStatus = 'off';
     
$("#myonoffswitch").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = 'on';
        $('.onoffswitch').find('#myonoffswitch').val(switchStatus)
        alert(switchStatus);// To verify
    }
    else {
       switchStatus = 'off';
       $('.onoffswitch').find('#myonoffswitch').val(switchStatus)
       alert(switchStatus);// To verify
    }
});

    $('.trash-download').on('click',function(){
        
                  let id = $(this).data('id')
                  $('#modal-delete-download').modal('show')
                  $('#modal-delete-download').find('#deleteDownload').attr('action',`/admin/download/deleteDownload/${id}`)
    });
    });
</script>
@endsection