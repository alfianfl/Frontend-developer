{{-- display mobile untuk partner organization --}}
<style>
    .mobile-partner-display {
        display: none;
    }

    /* resonsive breakpoint */
    @media only screen and (max-width: 414px) {
        .mobile-partner-display {
            display: flex;
            width: 93%
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-partner-mobile mobile-partner-display">
                @foreach ($p_os as $p_o)
                <div class="thumb-partner-mobile"><img src="{{asset("assets/img/logouniv/{$p_o->partner_picture}")}}" /></div>
                @endforeach
            </div>
        </div>
    </div>
</div>