<section id="call-of-paper" class="mt-5">
  <div class="important-date">
    <h4 class="text-center font-weight-bold">Proof of Member or Student</h4>
  </div>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-12">
        <div class="button pr-3 mb-3 d-flex w-100 justify-content-end mt-2">
          <button data-toggle="modal" data-target=".bd-add-modal-sm-1" class="btn btn-proof"><i
              class="far fa-plus-square mr-2"></i>Add Proof</button>
        </div>
        @if(session()->has('succes_member'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('succes_member') }}
          </strong>
        </div>
        @endif
        @if(session()->has('Failed_member'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('Failed_member') }} {{ $errors->first('member')}}
          </strong>
        </div>
        @endif
        <div class="mx-3 tabel-conference">
          <div class="mx-3 tabel-conference">
            {{-- Tabel Proof of Member --}}

            <table class=" text-center ">
              <thead>
                <tr>
                  <th style="width: 5%" scope="col">No</th>
                  <th style="width: 32.5%" scope="col">General</th>
                  <th style="width: 15%" scope="col">Status</th>
                  <th style="width: 15%" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($member as $mbr)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><a class="hover-download"
                      href="{{ route ('download.member',$mbr->member_id)}}">{{$mbr->file_name}}</a></td>
                  @foreach ($arrayStatusPesanan as $key => $value)
                  @if($mbr->status == $key)
                  <td>{{$value}}</td>
                  @endif
                  @endforeach
                  <td class="text-center">
                    @if($mbr->status !=1)
                    <i data-toggle="modal" data-id="{{$mbr->member_id}}" data-nama="{{$mbr->file_name}}"
                      id="fa-edit-member" class="fas fa-edit edit-member"></i>
                    <i data-toggle="modal" data-id="{{$mbr->member_id}}" id="fa-trash-alt-members"
                      class="fas fa-trash-alt delete-member "></i>
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
@include('pages.components.submissions.modalSubmissions.modalProofOfMember')