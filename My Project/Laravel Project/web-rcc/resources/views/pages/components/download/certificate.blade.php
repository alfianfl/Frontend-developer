<section id="certificate-paper ">
    <div class="certificate py-2 mt-5" style="background-image:url({{'../assets/img/bg-judul.png'}}">
        <h4>Certificate</h4>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="img-thumbnail-1">
                    <a>
                        <input id="names" value="{{$user->name}}" type='text' hidden>
                        <canvas class="img-fluid" id="canvas" height="793px" width="1096px"></canvas>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" id="download-btn">
                <button class="btn btn-primary"> Download</button>
            </a>
        </div>
    </div>
</section>