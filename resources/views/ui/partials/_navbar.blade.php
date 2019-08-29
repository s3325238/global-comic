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
                <li class="button-container nav-item iframe-extern">
                    <a href="{{ route('testLogin') }}"
                        class="btn btn-info btn-round btn-block">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                {{-- <li>&nbsp;&nbsp;</li> --}}
                <li>
                    <div class="divider"></div>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <a href="https://www.creative-tim.com/product/material-kit-pro?ref=presentation" target="_blank"
                        class="btn btn-rose btn-round btn-block">
                        <i class="fas fa-registered"></i> Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>