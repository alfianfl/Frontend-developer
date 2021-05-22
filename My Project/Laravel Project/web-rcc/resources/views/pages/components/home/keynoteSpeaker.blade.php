<section id="keynote-speaker" class="mt-5">
    <div class="background-keynote py-2" style="background-image:url({{'../assets/img/bg-judul.png'}}">
        <h4> Keynote Speaker</h4>
    </div>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            @foreach ($keynote as $item)
            <div class=" col-12 col-sm-6 col-md-6 col-lg-3 d-flex justify-content-center ">

                <div class="thumb-card">
                    <div>
                        <img height="310px" width="288px" src="{{url('keynote')."/".$item->image}}" alt="keyote">
                    </div>
                    <div class="body-card d-flex flex-column text-center px-2">
                        <span style="font-size:17px">{{$item->name}}</span>
                        <span style="font-size:14px">{{$item->institution}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex justify-content-center ">
                <div class="thumb-card " >
                    <div>
                        <img height="310px" width="288px"  src="{{'../assets/img/Adibah.png'}}" alt="keyote">
        </div>
        <div class="body-card d-flex flex-column text-center px-2">
            <span style="font-size:17px">Assoc. Prof. Ts. Dr. Adibah Shuib, FI MA</span>
            <span style="font-size:14px">Universiti Teknologi MARA (UiTM), Malaysia</span>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex justify-content-center ">
        <div class="thumb-card">
            <div>
                <img height="310px" width="288px" src="{{'../assets/img/Albert.png'}}" alt="keyote">
            </div>
            <div class="body-card d-flex flex-column text-center px-2">
                <span style="font-size:17px">Assoc. Prof. Dr. Albert C. J. Luo</span>
                <span style="font-size:14px">Southern Illinois University Edwardsville, Illinois, Amerika Serikat</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex justify-content-center">
        <div class="thumb-card">
            <div>
                <img height="310px" width="288px" src="{{'../assets/img/Sudradjat.png'}}" alt="keyote">
            </div>
            <div class="body-card d-flex flex-column  text-center px-2">
                <span style="font-size:17px">Prof. Dr. Sudradjat Supian</span>
                <span style="font-size:14px">Padjadjaran University, Jatinangor, West Java, Indonesia</span>
            </div>
        </div>
    </div> --}}
    </div>
    </div>
</section>