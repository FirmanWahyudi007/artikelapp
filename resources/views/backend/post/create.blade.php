@extends('backend.layouts.app')
@section('title', @trans('translation.post'))
@section('header', @trans('translation.post'))
@section('style-extra')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($post) ? 'Edit' : trans('translation.create') }} @lang('translation.post')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="post"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ isset($post) ? method_field('PUT') : '' }}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.title')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title" value="{{ $post->judul ?? '' }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.thumbnail')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="thumbnail" accept="image/*"
                                    {{ isset($post) ? '' : 'required' }}>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.content')</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="content">{!! $post->isi_artikel ?? '' !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">@lang('translation.save')</button>
                                <a href="{{ route('post.index') }}" class="btn btn-danger">@lang('translation.cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-extra')
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection
