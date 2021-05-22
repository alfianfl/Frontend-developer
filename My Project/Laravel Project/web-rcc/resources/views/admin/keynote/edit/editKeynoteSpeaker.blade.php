@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Keynote Speaker
@endsection


@section('link_css')

@endsection

{{-- content untuk edit keynote --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <h1>Edit Keynote Speaker</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/keynote')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        {{-- Form edit keyonote --}}
                        <form action="{{route('admin.keynote.update',$keynote->keynote_id)}}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{$keynote->image}}</label>
                                </div>
                                <small for="formGroupExampleInput" class="font-weight-bold">Max : 2MB and png or
                                    jpg</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input name="name" value="{{$keynote->name}}" type="name" class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Institution</label>
                                <input name="institution" value="{{$keynote->institution}}" type="institution"
                                    class="form-control" id="formGroupExampleInput2" placeholder="">
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