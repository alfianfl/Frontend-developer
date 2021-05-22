{{-- ADD DATA ABSTRACT--}}
<div class="modal fade bd-add-modal-sm-2 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center">
        Add abstract
      </h1>
      <form action="{{route ('upload.abstract')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" d-flex justify-content-between flex-column" style="height: 400px">
          <div>
            <span style="color:#526280">Title of Abstract</span><br>
            <!-- Propeller Filled File Input -->
            <div>
              <input class="form-control" value="" style="background-color: #E0E0E0;border-radius:10px" type="text"
                name="abstractTitle" id="real-file" />
            </div>
          </div>
          <div>
            <span style="color:#526280">Browse the file</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input type="file" class="file-max" name="fileAbstract" id="real-file4" hidden="hidden" />
              <span class="custom-text" style="align-self: center" id="custom-text4">No file chosen, yet.</span>
              <button class="btn custom-button" type="button" id="custom-button4">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px">Maximum upload file size : 3 MB and format .pdf</strong>
          </div>
          {{-- PILIH CONFERENCE NAME --}}
          <div>
            <span style="color:#526280">Conference Name</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select style="background-color: #E0E0E0;border-radius:10px" class="form-control" name="conference_id"
                required>
                @forelse ($audience as $adc)

                <option value="{{$adc->conference_id}}">
                  {{$adc->conference->conference_title}}
                </option>
                @empty

                <option value="notregistered">
                  Not registered in conference
                </option>

                @endforelse

              </select>
            </div>
          </div>

          {{-- UPLOAD AUTHOR --}}
          <div>
            <span style="color:#526280">Author</span><br>
            <!-- Propeller Filled File Input -->
            <div>
              <input class="form-control author" value="" name="author" placeholder="Writer1 ; Writer 2 ; Writer3"
                style="background-color: #E0E0E0;border-radius:10px" type="text" name="abstractTitle" id="real-file" />
            </div>
            <strong class="ml-1" style="font-size: 10px">Format : Writer1 ; Writer 2 ; Writer3</strong>
          </div>
          <div class="button">
            <button class="btn btn-upload w-100">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- EDIT DATA ABSTRACT--}}
<div class="modal fade bd-edit-modal-sm-2 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-edit-abstract" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center">
        Edit abstract
      </h1>
      <form action="" method="POST" enctype="multipart/form-data" id="editAbstract">
        @csrf
        <div class="upload-proof d-flex justify-content-between flex-column" style="height: 400px">
          <div>
            <span style="color:#526280">Title of Abstract</span><br>
            <!-- Propeller Filled File Input -->
            <div>
              <input class="form-control title-abstract" name="abstractTitle"
                style="background-color: #E0E0E0;border-radius:10px" type="text" id="real-file" />
            </div>
          </div>
          <div>
            <span style="color:#526280">Browse the file</span><br>
            <!-- Propeller Filled File Input -->
            <div style="background-color: #E0E0E0;border-radius:10px"
              class="w-100  mr-5 d-flex justify-content-between">
              <input class="file-max" type="file" name="fileAbstract" id="real-file5" hidden="hidden" />
              <span class="custom-text" style="align-self: center" id="custom-text5">No file chosen, yet.</span>
              <button class="btn custom-button" type="button" id="custom-button5">Browse</button>
            </div>
            <strong class="ml-1" style="font-size: 10px">Maximum upload file size : 3 MB and format .pdf</strong>
          </div>
          {{-- PILIH CONFERENCE NAME --}}
          <div>
            <span style="color:#526280">Conference Name</span><br>
            <!-- Propeller Filled File Input -->
            <div class="w-100  mr-5 d-flex justify-content-between">
              <select style="background-color: #E0E0E0;border-radius:10px" class="form-control" name="conference_id"
                required>
                @foreach ($audience as $adc)
                <option value="{{$adc->conference_id}}">
                  {{$adc->conference->conference_title}}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          {{-- UPLOAD AUTHOR --}}
          <div>
            <span style="color:#526280">Author</span><br>
            <!-- Propeller Filled File Input -->
            <div>
              <input class="form-control author" name="author" placeholder="Writer1 ; Writer 2 ; Writer3"
                style="background-color: #E0E0E0;border-radius:10px" type="text" name="abstractTitle" id="real-file" />
            </div>
            <strong class="ml-1" style="font-size: 10px">Format : Writer1 ; Writer 2 ; Writer3</strong>
          </div>
          <div class="button">
            <button class="btn btn-upload w-100">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- DELETE  ABSTRACT--}}
<div class="modal fade bd-delete-modal-sm-2 " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  id="modal-delete-abstract" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content px-3 pt-2 pb-4 ">
      <div class="modal-title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h1 class="text-center text-delete" style="font-size:20px">
        Delete Abstract
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
            <form action="" method="POST" id="deleteAbstract">
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