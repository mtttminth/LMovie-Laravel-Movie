@extends('layouts.admin')
@section('content')
<h1>Admin dashboard</h1>
    <!-- Movies Count Card -->
    <div class="col-xxl-4 col-xl-12">
          <div class="card-body">
            <h5 class="card-title">Total Movies</h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-camera-reels"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $movieCount }}</h6>
              </div>
            </div>

          </div>
        </div>

      </div><!-- End Customers Card -->
@endsection


