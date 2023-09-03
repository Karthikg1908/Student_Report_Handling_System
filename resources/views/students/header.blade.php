<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Student Report Handling System</strong></h3>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                data-toggle="dropdown">
                @if(Auth::user()->profilePicture)
                <img src="../images/students/{{Auth::user()->profilePicture}}" class="avatar img-fluid rounded mr-1"
                    alt="profile pic" />
                @else
                <img src="../img/logo.png" class="avatar img-fluid rounded mr-1"
                    alt="profile pic" />
                @endif
                <span class="text-dark">{{Auth::user()->name}}</span>

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/student/profile"><i class="align-middle mr-1"
                        data-feather="user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                {{-- <form class="modal-content-logout" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout mr-2 text-primary"></i> Log Out </a>
                </form> --}}
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i> Signout </a>

                <form class="modal-content-logout" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" enctype="multipart/form-data">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
    </div>
</nav>
