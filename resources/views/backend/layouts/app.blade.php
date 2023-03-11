@include('backend.layouts.header')

<body>
    @include('sweetalert::alert')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('backend.layouts.navbar')
            @include('backend.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @yield('modal')
            @include('backend.layouts.footer')
        </div>
    </div>
</body>
@include('backend.layouts.script')
