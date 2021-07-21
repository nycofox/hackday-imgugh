<nav class="navbar navbar-expand-lg mb-4">
    <a class="navbar-brand" href="{{ route('home') }}">
        {{--        {{ config('app.name') }}--}}
        <img src="{{ url('img/imgugh-logo.png') }}" alt="logo" style="height: 30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        {{--        <span class="text-light navbar-toggler-icon"></span>--}}
        <i class="fa fa-bars text-light" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn btn-success btn-sm ml-4" href="{{ route('upload') }}">
                    <i class="fa fa-plus-circle"></i>
                    <strong>&nbsp;Upload</strong>
                </a>
            </li>
        </ul>

        <div>
            @guest
                <a href="{{ route('login') }}" class="nav-item btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="nav-item btn btn-primary">Register</a>
            @endguest

            @auth
                <item class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                        {{--                <img src="{{ auth()->user()->avatar }}" class="bg-light">--}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('profile', auth()->user()) }}">Profile</a>
                        {{--                    <a class="dropdown-item" href="#">Register</a>--}}

                        <div class="dropdown-divider"></div>
                        @if(auth()->user()->admin)
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form>
                </item>
            @endauth
        </div>
    </div>

</nav>
