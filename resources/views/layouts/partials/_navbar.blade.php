<nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm p-3 mb-5  rounded">
<a class="navbar-brand" href="{{route('home')}}" style="margin-top:-10px;font:100 30px 'Pacifico', Helvetica, sans-serif;color: #646464;
text-shadow: 2px 2px 0px rgba(0,0,0,0.1);">Perpusku</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0 d-none d-md-inline-block">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>&nbsp;&nbsp;Hello there, <b>{{auth::User()->name}}</b></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>