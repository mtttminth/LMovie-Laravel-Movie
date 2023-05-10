@extends('layouts.admin')
@section('content')
    @include('components.alerts')

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>
    <div class="container">
        <div class="col-12">
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
@endsection


@push('scripts')
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
@endpush
