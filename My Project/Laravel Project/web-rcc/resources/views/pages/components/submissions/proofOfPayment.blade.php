<section id="proof-payment-blade" class="mt-5">
  <div class="important-date">
    <h4 class="font-weight-bold text-center">Proof of Payment</h4>
  </div>
  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-12">
        <div class="button pr-3 mb-3 d-flex w-100 justify-content-end mt-2">
          <button data-toggle="modal" data-target=".bd-add-modal-sm" class="btn btn-proof"><i
              class="far fa-plus-square mr-2"></i>Add Proof</button>
        </div>
        @if(session()->has('status'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('status') }}
          </strong>
        </div>
        @endif
        @if(session()->has('succes_Register'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('succes_Register') }}
          </strong>
        </div>
        @endif
        @if(session()->has('Failed'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('Failed') }} {{ $errors->first('file')}}
          </strong>
        </div>
        @endif
        @if(session()->has('had_registered'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>
            {{ session()->get('had_registered') }}
          </strong>
        </div>
        @endif
        <div class="mx-3 tabel-conference ">
          {{-- tabel Proof of Payment --}}
          <table id="dataTable" class=" text-center ">
            <thead>
              <tr>
                <th style="width: 5%" scope="col">No</th>
                <th style="width: 32.5%" scope="col">General</th>
                <th style="width: 32.5%" scope="col">Conference Name</th>
                <th style="width: 15%" scope="col">Status</th>
                <th style="width: 15%" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesanan as $psn)
              <tr>
                <td>{{$loop->iteration}}</td>

                <td><a class="hover-download " href="{{ route ('download.payments',$psn->pesanan_id)}}"
                    id="paymentDownload">{{$psn->file_name}}</a></td>
                {{-- <td>Iccom 2021 Unpad</td> --}}
                <td data-id="{{$psn->conference->conference_title}}">{{$psn->conference->conference_title}}</td>
                @foreach ($arrayStatusPesanan as $key => $value)
                @if($psn->status == $key)
                <td>{{$value}}</td>
                @endif
                @endforeach
                <td class="text-center edit">
                  @if($psn->status !=1 )
                  <i data-toggle="modal" data-id="{{ $psn->pesanan_id}}" data-nama="{{$psn->file_name}}"
                    id="fa-edit-payment" class="fas fa-edit edit-payment"></i>
                  <i data-toggle="modal" data-id="{{ $psn->pesanan_id}}" id=" fa-trash-alt-payment"
                    class="fas fa-trash-alt trash-payments "></i>
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
{{-- <div id="payment-modal"></div> --}}
@include('pages.components.submissions.modalSubmissions.modalProofOfPayment')

{{-- JANGAN DIHAPUS @DZIKAL INI YANG PAKE FILEPOND (PLAN A) --}}
{{-- <form method="POST" enctype="multipart/form-data" action="{{route ('upload')}}">
@csrf
<input type="file" id="avatar" class="filepond" name="avatar" multiple data-allow-reorder="true"
  data-max-file-size="3MB" data-max-files="3">
<select name="conference_id" required>

  @foreach ($conferences as $conference)
  <option value="{{$conference->conference_id}}">{{$conference->conference_title}}</option>
  @endforeach
</select>
<div class="d-flex flex-column flex-wrap">
  <button class="btn btn-upload mt-3">Upload</button>
</div>

</form> --}}