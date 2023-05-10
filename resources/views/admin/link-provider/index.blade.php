@extends('layouts.admin')
@section('content')
    @include('components.alerts')

    <a href="{{ route('link_providers.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Add new</a>

    <div class="container">
        <div class="col-12">
            @if ($link_providers->isNotEmpty())
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($link_providers as $link_provider)
                            <tr>
                                <td>{{ $link_provider->id }}</td>
                                <td><a href="{{ route('link_providers.edit', $link_provider->slug) }}">
                                        <div class="lh-sm py-2">
                                            {{ $link_provider->title }}
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('link_providers.destroy', $link_provider->slug) }}"
                                        method="post" enctype="multipart/form-data">
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
                <p>No Link Provider found.</p>
            @endif
        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
@endpush
