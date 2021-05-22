<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-konten">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="content-1">

                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 px-5 ">
                    <div class="content-2 my-5">
                        <h2>Login RCC</h2>
                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="password" class="form-control" id="passowrd" name="password"
                                    placeholder="Enter your Password">
                            </div>
                            <div class="d-flex flex-column flex-wrap">
                                <button class="btn btn-login mt-3">Login</button>
                                <span class="change-register text-center">Don’t have an account ? <a
                                        href="#">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>