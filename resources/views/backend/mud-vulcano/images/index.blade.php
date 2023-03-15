@extends('backend.layouts.app')
@section('title', @trans('translation.mud-vulcano-images'))
@section('header', @trans('translation.mud-vulcano-images'))
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('translation.mud-vulcano-images')</h4>
                    <div class="card-header-action">
                        <a href="{{ route('mud-vulcano.images.create', request()->route('id')) }}"
                            class="btn btn-primary">@lang('translation.create')</a>
                        <a href="{{ route('mud-vulcano.index') }}" class="btn btn-secondary">@lang('translation.back')</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>@lang('translation.images')</th>
                                <th>@lang('translation.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($mud_vulcanos as $mud_vulcano)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $mud_vulcano->nama }}</td>
                                        <td>{{ $mud_vulcano->alamat }}</td>
                                        <td>{{ $mud_vulcano->latitude }}</td>
                                        <td>{{ $mud_vulcano->longitude }}</td>
                                        <td>{{ $mud_vulcano->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('mud_vulcano.edit', $mud_vulcano->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('mud_vulcano.destroy', $mud_vulcano->id) }}"
                                                method="POST" class="d-inline">
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
@section('script-extra')
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('mud-vulcano.images', request()->route('id')) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
