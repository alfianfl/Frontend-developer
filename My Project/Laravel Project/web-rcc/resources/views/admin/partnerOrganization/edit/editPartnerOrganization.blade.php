@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Partner Organization
@endsection


@section('link_css')

@endsection

{{-- content untuk edit partner organization --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <h1>Edit Partner Organization</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/partnerOrganization')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        {{-- Form edit partner organization --}}
                        <form action="{{route('admin.partnerOrganization.update', $p_o->partner_id)}}" method="POST" enctype="multipart/form-data">
                            @if (session('error_message'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('error_message')}}
                            </div>
                            @endif

                            @if($errors->any())
                            @foreach($errors->all() as $errors)
                            <div class="alert alert-danger" role="alert">
                                {{$errors}}
                            </div>
                            @endforeach
                            @endif

                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input name="partner_name" value="{{$p_o->partner_name}}" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Picture</label>
                                <div class="custom-file">
                                    <input name="partner_picture" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{$p_o->partner_picture}}</label>
                                </div>
                                <small for="formGroupExampleInput" class="font-weight-bold">Max : 2MB and png/jpg/jpeg</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Address</label>
                                <input type="text" name="address_organization" value="{{$p_o->address_organization}}" class="form-control" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Conference</label>
                                <select class="custom-select" id="formGroupExampleInput" name="conference_id">
                                    @foreach ($conferences as $conference)
                                    @if ($conference->conference_id == $p_o->conference_id)
                                    <option value="{{$conference->conference_id}}" selected>{{$conference->conference_title}}</option>
                                    @else
                                    <option value="{{$conference->conference_id}}">{{$conference->conference_title}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="button-submit">
                                <button class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@section('link_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
<script src="{{ url('assets/vendor/jquery/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection