<section id="call-of-paper" class="mt-5 mb-5">
  <div class="important-date">
    <h4 class="text-center font-weight-bold">Full Paper</h4>
  </div>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-12">
        <div class="button pr-3 mb-3 d-flex w-100 justify-content-end mt-2">
          <button data-toggle="modal" data-target=".bd-add-modal-sm-3" class="btn btn-proof"><i
              class="far fa-plus-square mr-2"></i>Add Full Paper</button>
        </div>
        @if(session()->has('succes_paper'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('succes_paper') }}
          </strong>
        </div>
        @endif
        @if(session()->has('Failed_paper'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('Failed_paper') }} {{ $errors->first('Fullpapers')}} | {{ $errors->first('titlePaper')}} |
            {{$errors->first('author')}}
          </strong>
        </div>
        @endif
        <div class="mx-3 tabel-conference">
          {{-- tabel Full Paper--}}
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
              @foreach ($paper as $paper)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><a class="hover-download"
                    href="{{ route ('download.papers',$paper->paper_id)}}">{{$paper->tittle}}</a></td>
                <td>{{$paper->conference->conference_title}} </td>
                <td>{{$paper->Author}}</td>
                @foreach ($arrayStatusPesanan as $key => $value)
                @if($paper->status == $key)
                <td>{{$value}}</td>
                @endif
                @endforeach
                <td class="text-center">
                  @if($paper->status != 1)
                  <i data-toggle="modal" data-id="{{$paper->paper_id}} " data-title="{{$paper->tittle}}"
                    data-file="{{$paper->full_paper}}" data-author="{{$paper->Author}}" d="fa-edit-paper"
                    class="fas fa-edit edit-paper"></i>
                  <i data-toggle="modal" data-id="{{$paper->paper_id}} " id="fa-trash-alt-papers"
                    class="fas fa-trash-alt delete-paper "></i>
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
</section>

{{-- @DZIKAL modal untuk input file --}}
@include('pages.components.submissions.modalSubmissions.modalFullPaper')