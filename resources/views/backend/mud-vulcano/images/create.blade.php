@extends('backend.layouts.app')
@section('title', @trans('translation.mud-vulcano-images'))
@section('header', @trans('translation.mud-vulcano-images'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.create') @lang('translation.mud-vulcano-images')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mud-vulcano.images.store', request()->route('id')) }}" method="post"
                        autocomplete="off" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">@lang('translation.images')</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="image" required accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                {{-- 2 tombol --}}
                                <button type="submit" class="btn btn-primary">@lang('translation.save')</button>
                                <a href="{{ route('mud-vulcano.images', request()->route('id')) }}"
                                    class="btn btn-danger">@lang('translation.cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
