@extends('masters.admin-master')
@section('content')
<h1>Create Genre</h1>

<form action="{{ route('genres.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="name" class="form-label" >Name</label>
      <input type="text" name="name" id="name" class="form-control"
      placeholder="name"
      aria-describedby="">
    </div>

    <div class="form-check form-switch mb-3">
        <input type="hidden" name="feature" value="0">
        <input name="feature" class="form-check-input" value="1" type="checkbox" id="feature">
        <label class="form-check-label" for="feature">Feature</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
