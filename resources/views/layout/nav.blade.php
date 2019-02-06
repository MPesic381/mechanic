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
                @if (!auth()->check())
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif
            </ul>
            @if (auth()->check())
                <a href="/logout" class="text-white">{{ auth()->user()->name }}</a>
            @endif
        </div>
    </nav>
</header>