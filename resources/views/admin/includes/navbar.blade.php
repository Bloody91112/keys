<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @yield('breadcrumbs')
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
        </li>
        <li class="nav-item dropdown show">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <div class="media p-2 align-items-center">
                    <img src="{{ auth()->user()->avatar() }}" alt="Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                           class="text-sm text-danger" href="{{ route('logout') }}">logout</a>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        </li>
    </ul>
</nav>
