<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>GunungLumpur</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}"
                        class="{{ \Route::current()->getName() == 'home' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('post') }}"
                        class="{{ \Route::current()->getName() == 'post' ? 'active' : '' }}">Post</a></li>
                <li class="dropdown"><a href="#"><span>Mud Vulcano</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Chart</a></li>
                        <li><a href="{{ route('mud-vulcano') }}">Data</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="{{ \Route::current()->getName() == 'about' ? 'active' : '' }}">About</a>
                </li>
                @guest
                    <li>
                        <a href="/login">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

    </div>
</header>
