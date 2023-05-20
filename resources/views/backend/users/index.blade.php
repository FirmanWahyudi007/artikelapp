@extends('backend.layouts.app')
@section('title', @trans('translation.author'))
@section('header', @trans('translation.author'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.author')</h4>
                    {{-- <div class="card-header-action">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">@lang('translation.create')</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>@lang('translation.name')</th>
                                <th>Email</th>
                                <th>@lang('translation.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                        @if ($user->is_active == 0)
                                            <a href="{{ route('user.active', $user->id) }}" class="btn btn-success">Active</a>
                                        @else
                                            <a href="{{ route('user.inactive', $user->id) }}"
                                                class="btn btn-warning">Inactive</a>
                                        @endif
                                    </td>
                                </tr>
                                {{-- {{ dd($user) }} --}}
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
            $('#modal-add').on('click', function() {
                $('#modal-add').modal('show');
            });
        });
    </script>
@endsection
