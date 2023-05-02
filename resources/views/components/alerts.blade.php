@if (Session::has('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif

{{-- Movie Alert --}}
@if (session('movie-created-message'))
    <div class="alert alert-success">{{ session('movie-created-message') }}</div>
@endif

@if (session('movie-deleted-message'))
    <div class="alert alert-danger">{{ session('movie-deleted-message') }}</div>
@endif

@if (session('movie-updated-message'))
    <div class="alert alert-success">{{ session('movie-updated-message') }}</div>
@endif

{{-- Genre Alert --}}
@if (session('genre-created-message'))
    <div class="alert alert-success">{{ session('genre-created-message') }}</div>
@endif

@if (session('genre-deleted-message'))
    <div class="alert alert-danger">{{ session('genre-deleted-message') }}</div>
@endif

@if (session('genre-updated-message'))
    <div class="alert alert-success">{{ session('genre-updated-message') }}</div>
@endif

{{-- Genre Alert --}}
@if (session('link_provider-created-message'))
    <div class="alert alert-success">{{ session('link_provider-created-message') }}</div>
@endif

@if (session('link_provider-deleted-message'))
    <div class="alert alert-danger">{{ session('link_provider-deleted-message') }}</div>
@endif

@if (session('link_provider-updated-message'))
    <div class="alert alert-success">{{ session('link_provider-updated-message') }}</div>
@endif

{{-- USER Alert --}}
@if (session('user-updated'))
    <div class="alert alert-success">{{ session('user-updated') }}</div>
@endif

@if (session('user-deleted'))
    <div class="alert alert-danger">{{ session('user-deleted') }}</div>
@endif

{{-- ROLE Alert --}}
@if (session('role-created'))
    <div class="alert alert-success">{{ session('role-created') }}</div>
@endif

{{-- General Alert --}}
@if (session('updated'))
    <div class="alert alert-success">{{ session('updated') }}</div>
@endif

@if (session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
@endif
