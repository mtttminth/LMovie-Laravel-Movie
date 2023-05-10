@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush

@section('content')
    @include('components.alerts')

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>

    <div class="container">
        <div class="col-12">
            <table id="datatable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.admin.movie.index') }}",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "cover"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "slug",
                        "render": function(data, type, full, meta) {
                            return '<a href="' + full.edit_url +
                                '" class="btn btn-primary">Edit</a>';
                        }
                    },

                    {
                        "data": "slug",
                        "render": function(data, type, full, meta) {
                            return '<form action="' + full.delete_url + '" method="post">' +
                                '@csrf @method("delete")' +
                                '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this movie?\')">Delete</button>' +
                                '</form>';
                        }
                    }
                ]
            });
        });
    </script>
@endpush
