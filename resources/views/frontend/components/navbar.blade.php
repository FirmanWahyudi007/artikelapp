<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>UpConstruction<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}"
                        class="{{ \Route::current()->getName() == 'home' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}"
                        class="{{ \Route::current()->getName() == 'about' ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('service') }}"
                        class="{{ \Route::current()->getName() == 'service' ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('project') }}"
                        class="{{ \Route::current()->getName() == 'project' ? 'active' : '' }}">Projects</a></li>
                <li><a href="{{ route('blog') }}"
                        class="{{ \Route::current()->getName() == 'blog' ? 'active' : '' }}">Blog</a></li>
                <li class="dropdown"><a href="#"><span>MUD VULCANO</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Grafik</a></li>
                        <li><a href="#">Data</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}"
                        class="{{ \Route::current()->getName() == 'contact' ? 'active' : '' }}">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header>
