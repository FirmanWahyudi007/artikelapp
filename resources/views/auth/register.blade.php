<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Mud Vulcano</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    @yield('style-extra')


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset('backend/assets/img/stisla-fill.svg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register.store') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your Name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-divider">
                                        Your Home
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Country</label>
                                            <select class="form-control selectric" name="country">
                                                <option>Indonesia</option>
                                                <option>Palestine</option>
                                                <option>Syria</option>
                                                <option>Malaysia</option>
                                                <option>Thailand</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Province</label>
                                            <input id="province" type="text" class="form-control" name="province"
                                                tabindex="1" required autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Afiliasi</label>
                                            <input id="province" type="text" class="form-control" name="afiliasi"
                                                tabindex="1" required autofocus>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            <a href="{{ route('login.index') }}">Login</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2023
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
@include('backend.layouts.script')
