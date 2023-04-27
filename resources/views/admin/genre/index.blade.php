@extends('layouts.admin')
@section('content')
@include('components.alerts')

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>

    <div class="col-12">

        <!-- Genres Filter -->
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

            <!-- Genres Datatables -->
            @if ($genres->isNotEmpty())
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
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
                                    <form action="{{ route('genres.destroy', $genre->slug) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            @else
                <p>No genres found.</p>
            @endif
        </div>

    </div>
    </div><!-- End Genres Datatables -->
@endsection


@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
@endpush
