@extends('backend.layouts.app')
@section('title', 'Post')
@section('style-extra')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Post')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="category">
                                    <option>Tech</option>
                                    <option>News</option>
                                    <option>Political</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Publish</button>
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
