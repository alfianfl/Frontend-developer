{{-- ADD DATA PROOF OF PAYMENT--}}
<div class="modal fade bd-add-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  aria-hidden="true" id="addProofPayments">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center mb-5">
        <strong> Proof Of Payment</strong>
      </h1>
      @if(session('Failed upload'))
      <div class="alert-danger">Upload gagal.</div>
      @endif
      <form method="POST" enctype="multipart/form-data" action="{{route ('upload')}}">
        @csrf
        <div class="upload-proof d-flex justify-content-around flex-column">
          <div>
            <span style="color:#526280">Upload the Proof</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input type="file" class="file-max" id="real-file" name="file" hidden="hidden" />
              <span class="custom-text" style="align-self: center" id="custom-text">No file chosen, yet.</span>
              <button class="btn custom-button" type="button" id="custom-button">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px"> Maximum upload file size : 3 MB and format png or jpg</strong>
          </div>
          {{-- PILIH CONFERENCE NAME --}}
          <div class="mt-3">
            <span style="color:#526280">Conference Name</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">

              <select name="conference_id" style="background-color: #E0E0E0;border-radius:10px" class="form-control"
                required>
                @forelse ($audience as $adc)
                <option value="{{$adc->conference_id}}">
                  {{$adc->conference->conference_title}}
                </option>
                @empty

                <option selected="true">
                  Not registered in conference
                </option>

                @endforelse
              </select>
            </div>
          </div>

          {{-- PILIH ROLE --}}
          <div class="mt-3">
            <span style="color:#526280">Role</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select name="role_payments" style="background-color: #E0E0E0;border-radius:10px" class="form-control"
                required>
                <option value="general">general</option>
                <option value="member">Member</option>
                <option value="student">Student</option>
              </select>
            </div>
          </div>
          <div class="button mt-4">
            <button class="btn btn-upload w-100">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- EDIT DATA PROOF OF PAYMENT --}}
<div class="modal fade bd-edit-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-edit" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center mb-5">
        <strong>Edit Proof Of Payment</strong>
      </h1>
      <form action="" method="POST" enctype="multipart/form-data" id="editForm">
        @csrf
        <div class="upload-proof d-flex justify-content-around flex-column">
          <div>
            <span style="color:#526280">Upload the Proof</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input type="file" class="file-max" id="real-file3" name="file" hidden="hidden" />
              <span class="custom-text text-conference" style="align-self: center" id="custom-text3">No file chosen,
                yet.</span>
              <button class="btn custom-button" type="button" id="custom-button3">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px">Maximum upload file size : 3 MB</strong>
          </div>
          {{-- PILIH CONFERENCE NAME --}}
          <div class="mt-3">
            <span style="color:#526280">Conference Name</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">

              <select name="conference_id" style="background-color: #E0E0E0;border-radius:10px" class="form-control"
                required>
                @foreach ($audience as $adc)
                <option value="{{$adc->conference_id}}">
                  {{$adc->conference->conference_title}}
                </option>
                @endforeach

              </select>
            </div>
          </div>
          {{-- PILIH ROLE --}}
          <div class="mt-3">
            <span style="color:#526280">Role</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select name="role_payments" style="background-color: #E0E0E0;border-radius:10px" class="form-control"
                required>

                <option value="general">general</option>
                <option value="member">Member</option>
                <option value="student">Student</option>
              </select>
            </div>
          </div>
          <div class="button mt-4">
            <button class="btn btn-upload w-100 btn-upload-payment">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- DELETE  PROOF OF PAYMENT--}}
<div class="modal fade bd-delete-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-delete" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4 ">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center text-delete" style="font-size:20px">
        Delete Proof Of Payment
      </h1>
      <h1 class="text-center mt-3 font-weight-normal" style="font-size:15px">
        Are you sure you want to delete this file ?
      </h1>
      <div class="mt-3">
        <div class="d-flex justify-content-around">
          <div class="button w-50 mx-3">
            <button data-dismiss="modal" type="button" class="btn btn-delete btn-secondary w-100">Keep</button>
          </div>
          <div class="button w-50 mx-3">
            <form action="" method="POST" id="deletePayments">
              @csrf
              {{method_field('delete')}}
              <a href="">
                <button class="btn btn-delete btn-danger w-100">Delete</button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>