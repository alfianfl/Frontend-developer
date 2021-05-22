<section id="call-of-paper" class="mt-5">
  <div class="important-date">
    <h4 class="text-center font-weight-bold">Abstract</h4>
  </div>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-12">
        <div class="button pr-3 mb-3 d-flex w-100 justify-content-end mt-2">
          <button data-toggle="modal" data-target=".bd-add-modal-sm-2" class="btn btn-proof"><i
              class="far fa-plus-square mr-2"></i>Add Abstract</button>
        </div>
        @if(session()->has('succes_abstract'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('succes_abstract') }}
          </strong>
        </div>
        @endif
        @if(session()->has('Failed_abstract'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('Failed_abstract') }} {{ $errors->first('fileAbstract')}}
            {{ $errors->first('abstractTitle')}}
            {{ $errors->first('author   ')}}
          </strong>
        </div>
        @endif
        <div class="mx-3 tabel-conference">
          {{-- tabel abstract--}}
          <table class=" text-center ">
            <thead>
              <tr>
                <th style="width: 5%" scope="col">No</th>
                <th style="width: 25%" scope="col">Title</th>
                <th style="width: 25%" scope="col">Conference Name</th>
                <th style="width: 20%" scope="col">Author</th>
                <th style="width: 12.5%" scope="col">Status</th>
                <th style="width: 12.5%" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($abstract as $abs)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><a class="hover-download" href="{{ route ('download.abstract',$abs->abstract_id)}}">{{$abs->title}}
                </td>
                <td>{{$abs->conference->conference_title}}</td>
                <td>{{$abs->Author}}</td>
                @foreach ($arrayStatusPesanan as $key => $value)
                @if($abs->status == $key)
                <td>{{$value}}</td>
                @endif
                @endforeach
                <td class="text-center">
                  @if($abs->status != 1)
                  <i data-toggle="modal" data-id="{{$abs->abstract_id}}" data-title="{{$abs->title}}"
                    data-file="{{$abs->abstract}}" data-author="{{$abs->Author}}" id="fa-edit-abstract"
                    class="fas fa-edit edit-abstract"></i>
                  <i data-toggle="modal" data-id="{{$abs->abstract_id}}" id="fa-trash-alt-abstract"
                    class="fas fa-trash-alt delete-abstract"></i>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>

{{-- @DZIKAL modal untuk input file --}}
@include('pages.components.submissions.modalSubmissions.modalAbstract')