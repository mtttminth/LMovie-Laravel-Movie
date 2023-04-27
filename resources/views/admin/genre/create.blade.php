@extends('layouts.admin')
@section('content')
    <h1>Create Genre</h1>
    @include('components.alerts')

    <div class="container">
        <form action="{{ route('genres.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" aria-describedby="">
                <label for="title" class="form-label">Title</label>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug"
                    aria-describedby="">
                <label for="slug" class="form-label">Slug</label>
                @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#title').change(function(e) {
            $.get('{{ route('genres.check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                });
        });
    </script>
@endpush
