@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush

@section('content')
    @include('components.alerts')

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>
    <div class="container">
        <div class="col-12">
            @if ($genres->isNotEmpty())
                <table id="datatable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" data-orderable="false" data-searchable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td><a href="{{ route('genres.edit', $genre->slug) }}">
                                        <div class="lh-sm py-2">
                                            {{ $genre->title }}
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('genres.edit', $genre->slug) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('genres.destroy', $genre->slug) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" data-orderable="false" data-searchable="false"></th>
                        </tr>
                    </tfoot>
                </table>
            @else
                <p>No genres found.</p>
            @endif
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush
