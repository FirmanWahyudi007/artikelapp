<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('post.index') }}">Artikel APP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('post.index') }}">GL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('admin/post', 'admin/post/*') ? 'active' : '' }}">
                <a href="{{ route('post.index') }}" class="nav-link"><i
                        class="fas fa-book"></i><span>@lang('translation.post')</span></a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="{{ Request::is('admin/users', 'admin/users/*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link"><i
                            class="fas fa-users"></i><span>@lang('translation.author')</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
