<section id="paper-template" class="mt-5">
    <div class="container-fluid mt-5">
        <h4>Paper Template</h4>
        <div class="row justify-content-center mt-5">
            @foreach ($templates as $template)
            <div class="mt-2 col-sm-12 col-lg-4 d-flex justify-content-center">
                <div class="card"  style="width: 75%">
                    <div class="m-2">
                        <img src="{{"../assets/img/icon_folder_template.svg"}}" width="100%" class="card-img-top" alt="paper">
                    </div>
                    <h5 class="card-title text-center mt-3">{{$template->title}}</h5>
                    <div class="card-body d-flex justify-content-end" style="background-image:url({{"../assets/img/rectangle.svg"}});">
                      <a href="{{route('download.template', $template->file_name)}}" class="btn btn-download">Download</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>