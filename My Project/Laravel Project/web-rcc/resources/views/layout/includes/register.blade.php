<div class="modal fade register-modal " id="register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-title mr-4 mt-4">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row jusitfy-content-center">
        <div class="col-lg-12 d-flex justify-content-center">
          <div class="thumb mt-3" style="background-image:url({{'../assets/img/registration_icon.svg'}}"></div>
        </div>
        <div class="col-lg-12 d-flex justify-content-center ">
          <div class="content-2 my-5 ">
            <h2>Register</h2>
            <form class="mt-4" method="POST" action="{{route ('register')}}">
              @csrf
              {{-- {{$errors}} --}}
              <div class="form-group">
                <label for="exampleFormControlInput1">Fullname</label>
                <input type="text" class="form-control " name="name" id="name" placeholder="Enter your full name">
                @if( $errors->first('name'))
                <div class="alert-danger">{{ $errors->first('name')}}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
                @if( $errors->first('email'))
                <div class="alert-danger">{{ $errors->first('email')}}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Organization</label>
                <input type="text" class="form-control" name="organization" id="organization"
                  placeholder="Enter your organization">
                @if( $errors->first('organization'))
                <div class="alert-danger">{{ $errors->first('organization')}}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Contact Number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your contact number">
                @if( $errors->first('phone'))
                <div class="alert-danger">{{ $errors->first('phone')}}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
                @if( $errors->first('address'))
                <div class="alert-danger">{{ $errors->first('address')}}</div>
                @endif
              </div>
              {{-- city dan state --}}
              <div class="form-group d-flex">
                <div class="city mr-1">
                  <label for="exampleFormControlInput1">City</label>
                  <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
                  @if( $errors->first('city'))
                  <div class="alert-danger">{{ $errors->first('city')}}</div>
                  @endif
                </div>
                <div class="state">
                  <label for="exampleFormControlInput1">State</label>
                  <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state">
                  @if( $errors->first('state'))
                  <div class="alert-danger">{{ $errors->first('state')}}</div>
                  @endif
                </div>
              </div>
              {{-- country dan postal code --}}
              <div class="form-group d-flex">
                <div class="country mr-1">
                  <label for="exampleFormControlInput1">Country</label>
                  <input type="text" class="form-control " name="country" id="country" placeholder="Enter your country">
                  @if( $errors->first('country'))
                  <div class="alert-danger">{{ $errors->first('country')}}</div>
                  @endif
                </div>
                <div class="postal-code">
                  <label for="exampleFormControlInput1">ZIP / Postal Code</label>
                  <input type="number" class="form-control" name="postalcode" id="postalcode"
                    placeholder="Enter your postal code">
                  @if( $errors->first('postalcode'))
                  <div class="alert-danger">{{ $errors->first('postalcode')}}</div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="sel1">List as</label>
                <select class="form-control" name="pilihan" id="sel1">
                  {{-- <option selected>Participant/Non Participant</option> --}}
                  <option value="presenter">presenter</option>
                  <option value="nonpresenter">Non Presenter</option>
                  @if( $errors->first('pilihan'))
                  <div class="alert-danger">{{ $errors->first('pilihan')}}</div>
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control password-regis" name="password" id="password"
                  placeholder="Enter your Password">
                @if( $errors->first('password'))
                <div class="alert-danger">{{ $errors->first('password')}}</div>
                @endif
              </div>
              <div class="d-flex mb-2">
                <input type="checkbox" class="mr-2 " onclick="regisShow1()">
                <div style="font-size:10px;color:#526280">Show Password</div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                  placeholder="Confirm your Password">
              </div>
              <div class="d-flex">
                <input type="checkbox" class="mr-2 " onclick="regisShow()">
                <div style="font-size:10px;color:#526280">Show Password</div>
              </div>
              <div class="d-flex flex-column flex-wrap">
                <button class="btn btn-register mt-3">Register</button>
                <span class="change-register text-center">Don you have an account ? <a id="back-signin"
                    href="#">Login</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>