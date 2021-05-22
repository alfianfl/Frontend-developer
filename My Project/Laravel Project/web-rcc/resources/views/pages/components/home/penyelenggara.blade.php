<section id="penyelengara">

    <div class="container-fluid px-sm-0 px-lg-3 mt-5">
        <div class="row">

            <div class="col-12">
                <h4 class=" paper-title text-center" style="color: #0B4477">
                    {{$conference->conference_title}}

                </h4>
            </div>
            <div class="col-12 text-center">
                <p class=" detail-acara px-sm-0 px-lg-3">

                    Theme :<br>
                    {{$conference->conference_theme}}

                </p>
                <p>
                    {{$conference->conference_place}}
                </p>
                <p class="font-weight-bold">
                    <span style="color: #0B4477">Scopus Indexing of ICoCOME 2021 Papers</span>
                </p>
            </div>

            <div class="col-12 d-flex justify-content-center mt-4">

                <form action="/unpad-icocome2021/register/{{$conference->conference_id}}" method="post"
                    id="registerConference">
                    @csrf
                    {{-- <a href="{{ route('register.conference',$conference->conference_id)}}"> --}}
                    <button data-id="" class="btn button-conference-register">
                        Register at this Conference
                    </button>
                </form>
                {{-- </a> --}}
            </div>
        </div>
    </div>
</section>