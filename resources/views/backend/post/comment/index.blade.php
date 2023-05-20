@extends('backend.layouts.app')
@section('title', @trans('translation.post'))
@section('header', @trans('translation.post'))
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.post')</h4>
                    <div class="card-header-action">
                        <a href="{{ route('post.index') }}" class="btn btn-secondary">@lang('translation.back')</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>@lang('translation.name')</th>
                                <th>@lang('translation.email')</th>
                                <th>@lang('translation.comment')</th>
                                @if (auth()->user()->role == 'penulis')
                                    <th>@lang('translation.action')</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $value)
                                {{-- {{ dd($detail) }} --}}
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $value->comment->nama }}</td>
                                    <td>{{ $value->comment->email }}</td>
                                    <td>{{ $value->comment->isi_komentar }}</td>
                                    @if (auth()->user()->role == 'penulis')
                                        <td>
                                            <form action="{{ route('comment.destroy', $value->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script-extra')
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable();
        });
    </script>
@endsection
