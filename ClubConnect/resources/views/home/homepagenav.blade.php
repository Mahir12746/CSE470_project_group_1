<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            Club Connect
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">Clubs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Players</a>
                </li>  

                @if (Route::has('login'))
                    @auth
                    <!-- Display user-related options -->
                    <li class="nav-item">
                        <a class="btn custom-btn d-lg-block d-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <!-- Display login and registration options -->
                    <li class="nav-item">
                        <a class="btn custom-btn d-lg-block d-none" style="margin-right: 10px"
                            href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn custom-btn d-lg-block d-none" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>
