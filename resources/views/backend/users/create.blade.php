@extends('backend.layouts.app')
@section('title', @trans('translation.users'))
@section('header', @trans('translation.users'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.create') @lang('translation.users')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="post"
                        autocomplete="off">
                        {!! csrf_field() !!}
                        {{ isset($user) ? method_field('PUT') : '' }}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.name')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="email" value="{{ $user->email ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="role">
                                    <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="user" {{ isset($user) && $user->role == 'user' ? 'selected' : '' }}>
                                        User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <br>
                            <span id="message_password"></span>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.confirm_password')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" class="form-control" id="password_confirm" name="confirmPassword">
                            </div>
                            <br>
                            <span id='message'></span>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                {{-- 2 tombol --}}
                                <button type="submit" class="btn btn-primary">@lang('translation.save')</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger">@lang('translation.cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-extra')
    <script>
        $('#password_confirm').on('keyup', function() {
            if ($('#password').val() == $('#password_confirm').val()) {
                $('#message').html(' ');
                //kembali ke border default
                $('#password_confirm').css('border-color', '#e4e6fc');
            } else {
                $('#message').html('Password tidak sama').css('color', 'red');
                //border merah
                $('#password_confirm').css('border-color', 'red');
            }
        });
        $('#password').on('keyup', function() {
            //8 karakter
            if ($('#password').val().length < 8) {
                $('#message_password').html('Password minimal 8 karakter').css('color', 'red');
                //border merah
                $('#password').css('border-color', 'red');
            } else {
                $('#message_password').html(' ');
                //kembali ke border default
                $('#password').css('border-color', '#e4e6fc');
            }
        });
    </script>
@endsection
