@extends('backend.layouts.app')
@section('title', @trans('translation.post'))
@section('header', @trans('translation.post'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.post')</h4>
                    @if (auth()->user()->role == 'penulis')
                        <div class="card-header-action">
                            <a href="{{ route('post.create') }}" class="btn btn-primary">@lang('translation.create')</a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>@lang('translation.title')</th>
                                <th>@lang('translation.author')</th>
                                <th>@lang('translation.created_at')</th>
                                <th>@lang('translation.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <a href="{{ route('post.detailView', $post->slug) }}"
                                            target="_blank">{{ $post->judul }}
                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->created_at->format('d F Y ') }}</td>
                                    <td>
                                        @if (auth()->user()->role == 'penulis')
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('comment.index', $post->id) }}"
                                            class="btn btn-secondary">Komentar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
