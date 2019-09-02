<nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('home') }}">Global Comics</a>
            <button type="button" class="ml-auto navbar-toggler" data-toggle="collapse"
                data-target="#navigation-example2">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navigation-example2">
            <ul class="navbar-nav navbar-center ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('group') }}" class="nav-link">
                        Translate Group
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manga') }}" class="nav-link">
                        Manga List
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#pablo" class="nav-link">
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#pablo" class="nav-link">
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#pablo" class="nav-link">
                        Contact Us
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-center ml-auto">
                @guest
                <li class="button-container nav-item iframe-extern">
                    <a href="{{ route('login') }}" class="btn btn-info btn-round btn-block">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                {{-- <li>&nbsp;&nbsp;</li> --}}
                <li>
                    <div class="divider"></div>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <a href="{{ route('register') }}" class="btn btn-rose btn-round btn-block">
                        <i class="fas fa-registered"></i> Sign up
                    </a>
                </li>
                @else

                <li class="dropdown nav-item">
                    {{-- {{ Auth::user()->name }}&nbsp; --}}
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="profile-photo-small">
                            <img src="/img/upload/avatar/{{ Auth::user()->avatar }}" alt="Circle Image"
                                class="rounded-circle img-fluid">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#CpanelOrDashboard" class="dropdown-item">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>