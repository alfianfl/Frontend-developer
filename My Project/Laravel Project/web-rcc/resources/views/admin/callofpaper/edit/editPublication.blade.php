@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Publication
@endsection


@section('link_css')

@endsection

{{-- content untuk publication --}}
@section('content')
    <div id="layoutSidenav">
        @include('admin.sideNav.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-5">
                    <h1>Edit Publication</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                           <a href="{{url('/admin/publication')}}"><button class="btn btn-primary">Back</button></a> 
                        </div>
                        <div class="card-body">

                            {{-- Form edit publication --}}
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Description</label>
                                    <textarea class="form-control" id="summary-ckeditor-3"
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-3' );
    </script>
@endsection

