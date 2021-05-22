{{-- ADD DATA PROOF OF MEMBER/STUDENT--}}
<div class="modal fade bd-add-modal-sm-1 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center mb-5">
        <strong>Proof Of member/student</strong>
      </h1>
      <form action="{{route ('upload.members')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-proof d-flex justify-content-around flex-column">
          <div>
            <span style="color:#526280">Upload the Proof</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input class="file-max" type="file" name="member" id="real-file2" hidden="hidden" />
              <span class="custom-text" style="align-self: center" id="custom-text2">No file chosen, yet.</span>
              <button class="btn custom-button" type="button" id="custom-button2">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px">Maximum upload file size : 3 MB and format png or jpg</strong>
          </div>

          {{-- PILIH ROLE --}}
          <div>
            <span style="color:#526280">Role</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select name="role" style="background-color: #E0E0E0;border-radius:10px" class="form-control" required>
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

{{-- EDIT DATA PROOF OF MEMBER/STUDENT--}}
<div class="modal fade bd-edit-modal-sm-1 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-edit-members" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center mb-5">
        <strong>Proof Of member/student</strong>
      </h1>
      <form action="" method="POST" enctype="multipart/form-data" id="editMembers">
        @csrf
        <div class="upload-proof d-flex justify-content-around flex-column">
          <div>
            <span style="color:#526280">Upload the Proof</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input value="" class="file-max" type="file" name="member" id="real-file1" hidden="hidden" />
              <span class="custom-text" style="align-self: center" id="custom-text1">No file chosen, yet.</span>
              <button class="btn custom-button" type="button" id="custom-button1">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px">Maximum upload file size : 3 MB and format png or jpg</strong>
          </div>
          {{-- PILIH CONFERENCE NAME --}}

          {{-- PILIH ROLE --}}
          <div>
            <span style="color:#526280">Role</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select name="role" style="background-color: #E0E0E0;border-radius:10px" class="form-control" required>
                <option value="member">Member</option>
                <option value="student">Student</option>
              </select>
            </div>
          </div>
          <div class="button mt-4">
            <button class="btn btn-upload w-100">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- DELETE  PROOF OF MEMBER--}}
<div class="modal fade bd-delete-modal-sm-1 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-delete-members" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4 ">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center text-delete" style="font-size:20px">
        Delete Proof Of Member
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
            <form action="" method="POST" id="deleteMembers">
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