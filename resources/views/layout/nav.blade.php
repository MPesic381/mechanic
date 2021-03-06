<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Carousel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login">Login</a>
                    </li>
                @endif
                @if (auth()->check())
                    <span class="">{{ auth()->user()->name }}</span>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/cars">Cars</a>
                    </li>
                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/services">Services</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/bookings">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>