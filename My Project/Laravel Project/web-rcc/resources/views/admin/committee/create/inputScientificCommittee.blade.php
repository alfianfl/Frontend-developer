@extends('layout.base_layout_admin')

{{-- title --}}
@section('title')
Input Scientific Committee
@endsection


@section('link_css')

@endsection

{{-- content untuk Scientific Committee --}}
@section('content')
<div id="layoutSidenav">
    @include('admin.sideNav.sideNav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{url('/admin/scientificCommittee')}}"><button
                                class="btn btn-primary">Back</button></a>
                    </div>
                    <div class="card-body">
                        @if(session('failed_upload'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('failed_upload')}}
                        </div>
                        @endif

                        {{-- Form input Scientific Committee --}}
                        <form action="{{route('admin.add.scientific')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="">
                                <small for="formGroupExampleInput" class="font-weight-bold">Format : Name,
                                    Institution</small>
                                @if( $errors->first('name'))
                                <div class="alert-danger">{{ $errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Conference Name</label>
                                <select name="conference_id" class="custom-select">
                                    @foreach ($conference as $item)
                                    <option value="{{$item->conference_id}}">{{$item->conference_title}}</option>
                                    @endforeach
                                </select>
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