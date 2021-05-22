@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Full Paper
@endsection


@section('link_css')

@endsection

{{-- content untuk edit full paper --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <h1>Edit Status Full Paper</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/fullPaper')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        {{-- Form edit --}}
                        <form action="{{route('admin.update.paper',$paper->paper_id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Full Name</label>
                                <input value="{{$paper->user->name}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Email</label>
                                <input value="{{$paper->user->email}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input value="{{$paper->tittle}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Full Paper</label>
                                <input value="{{$paper->full_paper}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Conference Name</label>
                                <input value="{{$paper->conference->conference_title}}" type="text" disabled
                                    class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Author</label>
                                <input value="{{$paper->Author}}" type="text" disabled class="form-control"
                                    id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Status</label>
                                <select name="role" class="custom-select">
                                    @foreach ($arrayStatusPesanan as $key =>
                                    $value)
                                    @if($paper->status == $key)
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