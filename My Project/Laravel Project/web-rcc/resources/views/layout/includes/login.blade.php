<div class="modal fade login-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="content-1" style="background-image:url({{'../assets/img/login_icon.svg'}}">

                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 px-5 ">
                    <div class="modal-title mt-4 ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="content-2 my-5">
                        <h2>Login ICoCOME2021</h2>
                        @if( session('error'))
                        <div class="alert-danger">Email and/or password invalid.</div>
                        @endif
                        @if( session('must_login'))
                        <div class="alert-danger"> {{ session()->get('must_login') }}</div>
                        @endif
                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    placeholder="Enter your Email">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="password" class="form-control show-pass" id="password" name="password"
                                    required placeholder="Enter your Password">
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" class="mr-2 " onclick="myFunction()">
                                <div style="font-size:10px;color:#526280">Show Password</div>
                            </div>
                            <div class="d-flex flex-column flex-wrap">
                                <button class="btn btn-login mt-3">Login</button>
                                <span class="change-register text-center">Don’t have an account ? <a id="signup"
                                        href="#">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>