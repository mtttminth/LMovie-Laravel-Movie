@extends('masters.admin-master')
@section('content')
<h1>Create</h1>

<form action="{{ route('film.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="title" class="form-label" >Title</label>
      <input type="text" name="title" id="title" class="form-control"
      placeholder="Title"
      aria-describedby="">
    </div>

    <div class="form-group mb-3">
        <label for="film_image" class="form-label">Image Url</label>
        <input type="text" name="film_image" id="film_image" class="form-control"
        placeholder="Image Url"
        aria-describedby="">
      </div>

      <div class="col-md-4 mb-3">
        <label for="genre" class="form-label">Genre</label>
        <select name="genre" id="genre" class="form-select">
          <option value="" selected="" disabled="">Select Genre</option>
          <option value="action">Action</option>
          <option value="drama">Drama</option>
        </select>
      </div>

      <div class="col-md-4 mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
      </div>

      <div class="col-md-4 mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select">
          <option value="" selected="" disabled="">Select Type</option>
          <option value="movie">Movie</option>
          <option value="serie" >Serie</option>
        </select>
      </div>

      <div class="form-group mb-3">
        <label for="release_year" class="form-label">Year</label>
        <input type="text" name="release_year" id="release_year" class="form-control"
        placeholder="Release Year"
        aria-describedby="">
      </div>

      <div class="form-group mb-3">
        <label for="imdb_rating" class="form-label">IMDb Rating</label>
        <input type="number" name="imdb_rating" id="imdb_rating" class="form-control"
        placeholder="IMDb Rating"
        aria-describedby="">
      </div>

      <div class="form-check form-switch mb-3">
        <input type="hidden" name="publish" value="0">
        <input name="publish" class="form-check-input" value="1" type="checkbox" id="publish">
        <label class="form-check-label" for="publish">Publish</label>
      </div>

      <div class="form-check form-switch mb-3">
        <input type="hidden" name="member_only" value="0">
        <input type="checkbox" name="member_only" value="1" class="form-check-input" id="member_only">
        <label class="form-check-label" for="member_only">Member Only</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
