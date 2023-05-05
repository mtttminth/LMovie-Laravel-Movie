@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush

@section('content')
    @include('components.alerts')

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>

    <div class="container">
        <div class="col-12">

            <!-- Movies Filter -->
            <div class="card recent-sales overflow-auto">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Newest</a></li>
                        <li><a class="dropdown-item" href="#">Oldest</a></li>
                    </ul>
                </div>

                <!-- Movies Datatables -->
                <table id="datatable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('movies.edit', $movie->slug) }}">
                                        <div class="w-lg-50px">
                                            <picture>
                                                <img src="{{ $movie->cover }}"alt=""
                                                    class="img-fluid rounded-1 ls-is-cached lazyloaded" width="50"
                                                    height="90">
                                            </picture>
                                        </div>
                                    </a>
                                    <a href="{{ route('movies.edit', $movie->slug) }}">
                                        <div class="ps-4 lh-sm py-2">
                                            {{ $movie->title }}
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('movies.destroy', $movie->slug) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </tfoot>
                </table>
                <nav aria-label="Pagination">
                    <ul class="pagination">
                        {{ $movies->links() }}
                    </ul>
                </nav>
            </div>
        </div><!-- End Movies Datatables -->
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datatable").DataTable();
        });
    </script>
@endpush
