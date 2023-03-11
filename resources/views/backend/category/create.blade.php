@extends('backend.layouts.app')
@section('title', @trans('translation.category'))
@section('header', @trans('translation.category'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.create') @lang('translation.category')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                        method="post" autocomplete="off">
                        {!! csrf_field() !!}
                        {{ isset($category) ? method_field('PUT') : '' }}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.name')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name"
                                    value="{{ $category->name ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                {{-- 2 tombol --}}
                                <button type="submit" class="btn btn-primary">@lang('translation.save')</button>
                                <a href="{{ route('category.index') }}" class="btn btn-danger">@lang('translation.cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
