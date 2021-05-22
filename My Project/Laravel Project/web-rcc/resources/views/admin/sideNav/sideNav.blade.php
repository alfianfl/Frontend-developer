<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url('/admin')}}">
                    Dashboard
                </a>
                <a class="nav-link" href="{{url('/admin/adminPage')}}">
                    Admin
                </a>
                <a class="nav-link" href="{{url('/admin/active-user')}}">
                    Active User
                </a>
                <a class="nav-link" href="{{url('/admin/registeredConference')}}">
                    Registered Conference
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{url('/admin/conference')}}">
                    Conference
                </a>
                <a class="nav-link" href="{{url('/admin/keynote')}}">
                    Keynote Speaker
                </a>
                <a class="nav-link" href="{{url('/admin/partnerOrganization')}}">
                    Our Partner Organization
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    Committee
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/admin/scientificCommittee')}}">Scientific Committee</a>
                        {{-- <a class="nav-link" href="{{url('/admin/organizatingCommittee')}}">Organizing Committee</a> --}}
                    </nav>
                </div>
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    Call for paper
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> --}}
                {{-- <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/admin/importantDate')}}">Important Date</a>
                        <a class="nav-link" href="{{url('/admin/conferenceFee')}}">Conference Fee</a>
                        <a class="nav-link" href="{{url('/admin/publication')}}">Publication</a>
                        <a class="nav-link" href="{{url('/admin/bankAccount')}}">Bank Account</a>
                    </nav>
                </div> --}}
                {{-- <a class="nav-link" href="{{url('/admin/event')}}">
                    Event
                </a> --}}
                <a class="nav-link" href="{{url('/admin/download')}}">
                    Download
                </a>
                {{-- <a class="nav-link" href="#">
                    Contact Us
                </a> --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                    Submissions
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/admin/proofOfPayment')}}">Proof of payment</a>
                        <a class="nav-link" href="{{url('/admin/proofOfMember')}}">Proof of member</a>
                        <a class="nav-link" href="{{url('/admin/abstract')}}">Abstract</a>
                        <a class="nav-link" href="{{url('/admin/fullPaper')}}">Full Paper</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>