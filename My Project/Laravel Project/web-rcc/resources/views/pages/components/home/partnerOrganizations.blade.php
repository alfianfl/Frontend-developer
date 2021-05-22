<section id="partner-organizations">
    <div class="background-partner mt-5 py-2" style="background-image:url({{'../assets/img/bg-judul.png'}}">
        <h4>Partner Organizations</h4>
    </div>
    <div class="container-fluid mt-3">
        <div class="row ">
            <div class="col-lg-12 d-flex justify-content-center ">

                {{-- untuk ukuran desktop dan tablet --}}
                <div class="section-partner">
                    @foreach ($p_os as $p_o)
                    <div class="thumb-partner"><img src="{{asset("assets/img/logouniv/{$p_o->partner_picture}")}}" /></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="list-univ mt-5 w-100">
            <ul>
                @foreach ($p_os as $p_o)
                <li>{{$p_o->partner_name}}, {{$p_o->address_organization}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>