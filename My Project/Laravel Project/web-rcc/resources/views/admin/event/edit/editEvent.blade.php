@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Event
@endsection


@section('link_css')

@endsection

{{-- content untuk edit event --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <h1>Edit Event</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/event')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        {{-- Form edit event --}}
                        <form >
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input name="partner_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Picture</label>
                                <div class="custom-file">
                                    <input name="partner_picture" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <small for="formGroupExampleInput" class="font-weight-bold">Max : 2MB and png/jpg/jpeg</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description</label>
                                <textarea class="form-control" id="summary-ckeditor-5"
                                    name="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Conference Name</label>
                                <select class="custom-select">
                                  <option selected>Conference Name</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor-5' );
</script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection