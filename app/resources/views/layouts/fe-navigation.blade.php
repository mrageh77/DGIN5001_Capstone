<div class="logo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('images/logo.png') }}" class="brand-logo" alt="">
                    </a>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Find Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company') }}">Company</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resume') }}">Personal Profile</a>
                    </li>
                @endauth

            </ul>
            <div class="d-flex">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button onclick="event.preventDefault();
                    this.closest('form').submit();" class="btn btn-outline-secondary">Logout</button>
                    </form>
                @else
                    <a class="mr-2 btn btn-outline-secondary" href="{{ route('login') }}">Sign in</a>
                    <a class="btn btn-outline-secondary" href="{{ route('register') }}">Sign up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
