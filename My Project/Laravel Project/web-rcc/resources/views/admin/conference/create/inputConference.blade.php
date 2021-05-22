@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Input Conference
@endsection


@section('link_css')

@endsection

{{-- content untuk input conference --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/conference')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    @if(session('failed_upload'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('failed_upload')}}
                    </div>
                    @endif
                    <div class="card-body">

                        {{-- Form input conference --}}
                        <form action="{{route('admin.add.conferences')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input type="text" name="conference_title" class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                                @if( $errors->first('conference_title'))
                                <div class="alert-danger">{{ $errors->first('conference_title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Theme</label>
                                <input type="text" name="conference_theme" class="form-control"
                                    id="formGroupExampleInput2" placeholder="">
                                @if( $errors->first('conference_theme'))
                                <div class="alert-danger">{{ $errors->first('conference_theme')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Place and Date</label>
                                <input type="text" name="conference_place" class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                                @if( $errors->first('conference_place'))
                                <div class="alert-danger">{{ $errors->first('conference_place')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description</label>
                                <textarea class="form-control" name="conference_description"
                                    id="summary-ckeditor"></textarea>
                                @if( $errors->first('conference_description'))
                                <div class="alert-danger">{{ $errors->first('conference_description')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Conference Scope</label>
                                <textarea class="form-control" id="summary-ckeditor-2"
                                    name="conference_scope"></textarea>
                                @if( $errors->first('conference_scope'))
                                <div class="alert-danger">{{ $errors->first('conference_scope')}}</div>
                                @endif
                            </div>
                            <div class="button-submit">
                                <button class="btn btn-success">Save</button>
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
    CKEDITOR.replace( 'summary-ckeditor' );
        CKEDITOR.replace( 'summary-ckeditor-2' );
</script>
@endsection