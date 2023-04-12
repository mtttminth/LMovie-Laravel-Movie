@extends('layouts.home')
@section('content')
<h1 class="my-4">
    Page Heading
    <small>Secondary Text</small>
  </h1>

  <!-- Blog film -->
  @foreach ($contents as $content )


  <div class="card mb-4">
    <img
      class="card-img-top"
      src="{{ $content->image }}"
      alt="Card image cap"
    />
    <div class="card-body">
      <h2 class="card-title">{{ $content->title }}</h2>
      <p class="card-text">
        {{ Str::limit($content->description, '50', '...') }}
      </p>
      <a href="{{route('content',$content->id)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Released on {{ $content->created_at->diffForHumans() }}
      <a href="#">{{ $content->user->name }}</a>
    </div>
  </div>
  @endforeach


  <!-- Pagination -->
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul>
@endsection


