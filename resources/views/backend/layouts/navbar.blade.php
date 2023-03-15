<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav navbar-right ml-auto">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg ">
                @if (App::getLocale() == 'en')
                    <img class="img-fluid" src="{{ asset('/backend/assets/modules/flag-icon-css/flags/4x3/us.svg') }}"
                        alt="English Flag" width="40px">
                @else
                    <img class="img-fluid" src="{{ asset('/backend/assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                        alt="Indonesia Flag" width="40px">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('lang', 'en') }}" class="dropdown-item has-icon">
                    <img class="img-fluid" src="{{ asset('/backend/assets/modules/flag-icon-css/flags/4x3/us.svg') }}"
                        alt="English Flag" width="40px"> English
                </a>
                <a href="{{ route('lang', 'id') }}" class="dropdown-item has-icon">
                    <img class="img-fluid" src="{{ asset('/backend/assets/modules/flag-icon-css/flags/4x3/id.svg') }}"
                        alt="Indonesia Flag" width="40px"> Indonesia
                </a>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (auth()->user()->avatar)
                    <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1"
                        width="40px" height="40px">
                @else
                    <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
    </ul>
</nav>
