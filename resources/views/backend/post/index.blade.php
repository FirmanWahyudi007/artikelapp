@extends('backend.layouts.app')
@section('title', 'Post')
@section('header', 'Post')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post</h4>
                    <div class="card-header-action">
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
