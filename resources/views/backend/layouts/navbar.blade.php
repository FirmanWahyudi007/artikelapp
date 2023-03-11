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
                <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
