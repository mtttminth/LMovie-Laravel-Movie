@extends('masters.admin-master')
@section('content')
<h1>Create Movie</h1>

 <!-- Bordered Tabs Justified -->
<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
    <li class="nav-item flex-fill" role="presentation">
      <button class="nav-link w-100 active" id="general-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
    </li>
    <li class="nav-item flex-fill" role="presentation">
      <button class="nav-link w-100" id="video-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-video" type="button" role="tab" aria-controls="video" aria-selected="false">Video</button>
    </li>
</ul>

    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div class="tab-pane fade show active" id="bordered-justified-general" role="tabpanel" aria-labelledby="general-tab">
            <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                  <label for="title" class="form-label" >Title</label>
                  <input type="text" name="title" id="title" class="form-control"
                  placeholder="Title"
                  aria-describedby="">
                </div>

                <div class="form-group mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="text" name="cover" id="cover" class="form-control"
                    placeholder="Cover"
                    aria-describedby="">
                  </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" id="image" class="form-control"
                    placeholder="Image"
                    aria-describedby="">
                  </div>

                  {{-- <div class="col-md-4 mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-select">
                      <option value="" selected="" disabled="">Select Genre</option>
                      <option value="action">Action</option>
                      <option value="drama">Drama</option>
                    </select>
                  </div> --}}

                  <div class="col-md-4 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                  </div>

                  <input type="hidden" name="type" value="movie">

                  <div class="form-group mb-3">
                    <label for="release_year" class="form-label">Release Year</label>
                    <input type="text" name="release_year" id="release_year" class="form-control"
                    placeholder="Release Year"
                    aria-describedby="">
                  </div>

                  <div class="form-group mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" step=".1" min="0" max="10" name="rating" id="rating" class="form-control"
                    placeholder="0.0"
                    aria-describedby="">
                  </div>

                  <div class="form-check form-switch mb-3">
                    <input type="hidden" name="publish" value="0">
                    <input name="publish" class="form-check-input" value="1" type="checkbox" id="publish">
                    <label class="form-check-label" for="publish">Publish</label>
                  </div>

                  <div class="form-check form-switch mb-3">
                    <input type="hidden" name="feature" value="0">
                    <input name="feature" class="form-check-input" value="1" type="checkbox" id="feature">
                    <label class="form-check-label" for="feature">Feature</label>
                  </div>

                  <div class="form-check form-switch mb-3">
                    <input type="hidden" name="member_only" value="0">
                    <input type="checkbox" name="member_only" value="1" class="form-check-input" id="member_only">
                    <label class="form-check-label" for="member_only">Member Only</label>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        <div class="tab-pane fade" id="bordered-justified-video" role="tabpanel" aria-labelledby="video-tab">
          Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
        </div>
        <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
          Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
        </div>
      </div><!-- End Bordered Tabs Justified -->

@endsection
