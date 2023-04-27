@extends('layouts.admin')
@section('content')
    <h1>Edit Genre</h1>

    <form action="{{ route('genres.update', $genre->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" name="title" id="title"
                value="{{ $genre->title }}"class="form-control" placeholder="Title" aria-describedby="">
            <label for="title" class="form-label">Title</label>
            @error('title')
                <p class="text-danger px-2 mb-0">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="slug" id="slug" value="{{ $genre->slug }}"
                class="form-control" placeholder="Slug" aria-describedby="">
            <label for="slug" class="form-label">Slug</label>
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
