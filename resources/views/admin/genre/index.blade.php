@extends('masters.admin-master')
@section('content')

<a href="{{ route('genres.create') }}" class="btn btn-primary btn-icon-text rounded-pill"><i class="fa-solid fa-plus"></i> Add new</a>

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
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($genres as $genre )
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
              </tr>
            @endforeach


          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Genres Datatables -->
      @endsection


  @section('scripts')
  <script type="text/javascript" src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  @endsection
