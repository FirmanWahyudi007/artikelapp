@extends('backend.layouts.app')
@section('title', @trans('translation.users'))
@section('header', @trans('translation.users'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.users')</h4>
                    <div class="card-header-action">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">@lang('translation.create')</a>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>@lang('translation.action')</th>
                            </tr>
                        </thead>
                        <tbody>
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
            $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
            $('#modal-add').on('click', function() {
                $('#modal-add').modal('show');
            });
        });
    </script>
@endsection
