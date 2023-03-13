@extends('backend.layouts.app')
@section('title', @trans('translation.mud-vulcano'))
@section('header', @trans('translation.mud-vulcano'))
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
                    <h4>{{ isset($vulcano) ? 'Edit' : trans('translation.create') }} @lang('translation.mud-vulcano')</h4>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($vulcano) ? route('mud-vulcano.update', $vulcano->id) : route('mud-vulcano.store') }}"
                        method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ isset($vulcano) ? method_field('PUT') : '' }}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.name')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="{{ $vulcano->name ?? '' }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.thumbnail')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="thumbnail" accept="image/*"
                                    {{ isset($vulcano) ? '' : 'required' }}>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.address')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="address"
                                    value="{{ $vulcano->address ?? '' }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.coordinates')</label>
                            <div class="col-sm-3 col-md-3">
                                <input type="text" class="form-control" name="latitude"
                                    value="{{ $vulcano->latitude ?? '' }}" required placeholder="latitude">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-sm-3 col-md-3">
                                <input type="text" class="form-control" name="longitude"
                                    value="{{ $vulcano->longitude ?? '' }}" required placeholder="longitude">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.description')</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="content">{!! $vulcano->content ?? '' !!}</textarea>
                            </div>
                        </div>
                        @if (!isset($vulcano))
                            <div class="form-group row mb-4">
                                <label
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.images')</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="images[]" accept="image/*"
                                        onchange="preview_image();" id="upload_file" multiple>
                                    <br>
                                    <div id="previewImg"></div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">@lang('translation.save')</button>
                                <a href="{{ route('mud-vulcano.index') }}" class="btn btn-danger">@lang('translation.cancel')</a>
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
    @if (!isset($vulcano))
        <script>
            function preview_image() {
                $('#previewImg img').remove();
                var total_file = document.getElementById("upload_file").files.length;
                for (var i = 0; i < total_file; i++) {
                    $('#previewImg').append("<img src='" + URL.createObjectURL(event.target.files[i]) +
                        "'><br>");
                    //atur ukuran gambar
                    $('#previewImg img').css('width', '200px');
                    //tampilkan ke pinggir kanan dan sejajar
                    $('#previewImg img').css('float', 'right');
                    //display flex dan flex wrap
                    $('#previewImg').css('display', 'flex');
                    $('#previewImg').css('flex-wrap', 'wrap');
                    //jika tidak dipakai, hapus
                    $('#previewImg img').click(function() {
                        $(this).remove();
                    });
                    //jika gambar dipilih, hapus dulu
                }
            }
        </script>
    @endif
@endsection
