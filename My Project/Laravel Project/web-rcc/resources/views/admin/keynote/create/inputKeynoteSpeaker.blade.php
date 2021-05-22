@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Input Keynote Speaker
@endsection


@section('link_css')

@endsection

{{-- content untuk input keynote --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/keynote')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        @if(session('failed_upload'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('failed_upload')}}
                        </div>
                        @endif
                        {{-- Form input keyonote --}}
                        <form action="{{route('admin.add.keynote')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <small for="formGroupExampleInput" class="font-weight-bold">Max : 2MB and png or
                                    jpg</small>
                                @if( $errors->first('image'))
                                <div class="alert-danger">{{ $errors->first('image')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="">
                                @if( $errors->first('name'))
                                <div class="alert-danger">{{ $errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Institution</label>
                                <input name="institution" type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="">
                                @if( $errors->first('institution'))
                                <div class="alert-danger">{{ $errors->first('institution')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Conference</label><br>
                                <select class="custom-select" name="conference_id">
                                    @foreach ($conference as $item)
                                    <option value="{{$item->conference_id}}">{{$item->conference_title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="button-submit">
                                <button class="btn btn-success">Save</button>
                            </div>
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