@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('translation.users')</h4>
                    </div>
                    <div class="card-body">
                        {{ $user }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('translation.category')</h4>
                    </div>
                    <div class="card-body">
                        {{ $category }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('translation.post')</h4>
                    </div>
                    <div class="card-body">
                        {{ $post }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('translation.mud-vulcano')</h4>
                    </div>
                    <div class="card-body">
                        {{ $vulcano }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
