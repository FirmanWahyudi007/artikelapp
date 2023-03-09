<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('post', 'post/*') ? 'active' : '' }}">
                <a href="{{ route('post.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Post</span></a>
            </li>
            <li class="{{ Request::is('category') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link"><i
                        class="fas fa-list"></i><span>Category</span></a>
            </li>
            <li class="{{ Request::is('mud-vulcano') ? 'active' : '' }}">
                <a href="{{ route('mud-vulcano.index') }}" class="nav-link"><i class="fas fa-mountain"></i><span>Mud
                        Vulcano</span></a>
            </li>
            <li class="{{ Request::is('users') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>
        </ul>
    </aside>
</div>
