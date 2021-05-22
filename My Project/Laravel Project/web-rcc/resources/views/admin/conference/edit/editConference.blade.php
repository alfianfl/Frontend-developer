@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Conference
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
                <h1>Edit Conference</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/conference')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">

                        {{-- Form input conference --}}
                        <form action="{{route('admin.update.conference',$conference->conference_id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input name="conference_title" value="{{$conference->conference_title}}" type="text"
                                    class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Theme</label>
                                <input name="conference_theme" value="{{$conference->conference_theme}}" type="text"
                                    class="form-control" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Place and Date</label>
                                <input name="conference_place" value="{{$conference->conference_place}}" type="text"
                                    class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description</label>
                                <textarea class="form-control" id="summary-ckeditor"
                                    name="conference_description">{{$conference->conference_about}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Conference Scope</label>
                                <textarea class="form-control" id="summary-ckeditor-2"
                                    name="conference_scope">{{$conference->conference_scope}}</textarea>
                            </div>
                            <div class="form-group">
                                <select name="status">
                                    @if($conference->status == "on")
                                    <option value="{{$conference->status}}">
                                        {{$conference->status}}</option>
                                    <option value="off">Off</option>
                                    @elseif($conference->status == "off")
                                    <option value="{{$conference->status}}">
                                        {{$conference->status}}</option>
                                    <option value="on">on</option>



                                    @endif
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
    CKEDITOR.replace( 'summary-ckeditor' );
        CKEDITOR.replace( 'summary-ckeditor-2' );
</script>
@endsection