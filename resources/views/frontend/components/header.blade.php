<style>
    body {
        padding-top: 110px; /* Increased to separate from fixed navbar */
        background-color: #fffcfd;
    }

    .navbar-pastel {
        background-color: #dfc1cd;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); /* subtle shadow */
    }

    .navbar-pastel .nav-link {
        color: #4b4b4b;
    }

    .navbar-pastel .nav-link.active {
        font-weight: bold;
        color: #d48eb2;
    }

    .navbar-pastel .navbar-brand span {
        color: #d48eb2;
        font-weight: bold;
        font-size: 1.25rem;
    }

    .navbar-pastel .form-control::placeholder {
        color: #aaa;
    }

    .navbar-pastel .btn-outline-success {
        border-color: #d48eb2;
        color: #d48eb2;
    }

    .navbar-pastel .btn-outline-success:hover {
        background-color: #d48eb2;
        color: #fff;
    }

    /* Optional: add extra space below navbar too */
    main {
        margin-top: 20px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-pastel fixed-top shadow-sm py-3">
    <div class="container">
        {{-- 🌸 Logo and Brand --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('frontend.home') }}">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="MeiBlooms Logo" width="45" height="45" class="rounded-circle shadow-sm">
            <span>MeiBlooms</span>
        </a>

        {{-- Toggler --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar content --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            {{-- Left nav links --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-4 gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.pages.shop') ? 'active' : '' }}" href="{{ route('frontend.pages.shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.pages.about') ? 'active' : '' }}" href="{{ route('frontend.pages.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.pages.contact') ? 'active' : '' }}" href="{{ route('frontend.pages.contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.pages.cart') ? 'active' : '' }}" href="{{ route('frontend.pages.cart') }}">
                        🛒 Cart
                    </a>
                </li>
            </ul>

            {{-- Search bar --}}
            <form action="{{ route('search') }}" method="GET" class="d-flex me-lg-3 mt-3 mt-lg-0" role="search">
                <input class="form-control me-2" type="search" name="query" placeholder="Search bouquets..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            {{-- Auth links --}}
            <ul class="navbar-nav gap-2">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
