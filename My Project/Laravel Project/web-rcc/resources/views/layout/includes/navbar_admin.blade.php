<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
    <div>
        <a class="navbar-brand">Web RCC</a>
    </div>
    <!-- Navbar-->
    <div>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>