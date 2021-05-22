@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Edit Admin
@endsection


@section('link_css')

@endsection

{{-- content untuk input admin --}}
@section('content')
    <div id="layoutSidenav">
        @include('admin.sideNav.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-5">
                    <h1>Edit Admin</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                           <a href="{{url('/admin/adminPage')}}"><button class="btn btn-primary">Back</button></a> 
                        </div>
                        <div class="card-body">

                            {{-- Form input admin --}}
                            <form action="{{route('admin.adminPage.update', $admin->id)}}" method="POST">
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
                                  <input name="name" value="{{$admin->name}}" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input name="email" value="{{$admin->email}}" type="email" class="form-control" id="formGroupExampleInput2" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Password</label>
                                    <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="" autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="formGroupExampleInput" placeholder="" autocomplete="new-password">
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
