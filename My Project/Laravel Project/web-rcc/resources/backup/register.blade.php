<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="row jusitfy-content-center">
        <div class="col-lg-12 d-flex justify-content-center">
          <div class="thumb mt-3"></div>
        </div>
        <div class="col-lg-12 d-flex justify-content-center ">
          <div class="content-2 my-5 ">
            <h2>Register</h2>
            <form class="mt-4" method="POST" action="{{route ('register')}}">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Fullname</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Organization</label>
                <input type="text" class="form-control" name="organization" id="organization"
                  placeholder="Enter your organization">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Contact Number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your contact number">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
              </div>
              {{-- city dan state --}}
              <div class="form-group d-flex">
                <div class="city mr-1">
                  <label for="exampleFormControlInput1">City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
                </div>
                <div class="state">
                  <label for="exampleFormControlInput1">State</label>
                  <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state">
                </div>
              </div>
              {{-- country dan postal code --}}
              <div class="form-group d-flex">
                <div class="country mr-1">
                  <label for="exampleFormControlInput1">Country</label>
                  <input type="text" class="form-control " name="country" id="country" placeholder="Enter your country">
                </div>
                <div class="postal-code">
                  <label for="exampleFormControlInput1">ZIP / Postal Code</label>
                  <input type="number" class="form-control" name="postalcode" id="postalcode"
                    placeholder="Enter your postal code">
                </div>
              </div>
              <div class="form-group">
                <label for="sel1">List as</label>
                <select class="form-control" name="pilihan" id="sel1">
                  <option selected>Participant/Non Participant</option>
                  <option value="participant">Participant</option>
                  <option value="nonparticipant">Non Participant</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                  placeholder="Enter your Password">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                  placeholder="Confirm your Password">
              </div>
              <div class="d-flex flex-column flex-wrap">
                <button class="btn btn-register mt-3" type="submit">Register</button>
                <span class="change-register text-center">Don you have an account ? <a href="#">Login</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>