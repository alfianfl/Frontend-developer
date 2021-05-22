@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Abstract
@endsection


@section('link_css')

@endsection

{{-- content untuk edit abstract --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <h1>Edit Status Abstract </h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/abstract')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        {{-- Form edit --}}
                        <form action="{{route('admin.update.abstract',$abstract->abstract_id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Full Name</label>
                                <input value="{{$abstract->user->name}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Email</label>
                                <input value="{{$abstract->user->email}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input value="{{$abstract->title}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Abstract</label>
                                <input value="{{$abstract->abstract}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Conference Name</label>
                                <input value="{{$abstract->conference->conference_title}}" type="text" disabled
                                    class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Author</label>
                                <input value="{{$abstract->Author}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Status</label>
                                <select name="role" class="custom-select">
                                    @foreach ($arrayStatusPesanan as $key =>
                                    $value)
                                    @if($abstract->status == $key)
                                    <option value={{$key}} selected>{{$value}}</option>
                                    @else
                                    <option value={{$key}}>{{$value}}</option>
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