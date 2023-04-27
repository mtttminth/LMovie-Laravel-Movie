@extends('layouts.admin')
@section('content')
<h1>Create Genre</h1>

<form action="{{ route('genres.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="title" class="form-label" >Title</label>
      <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="slug" class="form-label" >Slug</label>
        <input type="text" name="slug" id="slug" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@push('scripts')
<script>
    $('#title').change(function(e) {
      $.get('{{ route('genres.check_slug') }}',
        { 'title': $(this).val() },
        function( data ) {
          $('#slug').val(data.slug);
        });
    });
  </script>
@endpush
