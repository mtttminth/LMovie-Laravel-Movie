@extends('layouts.admin')

@section('styles')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
    <h1>Create Movie</h1>


    <div class="container">

        <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row gx-xl-4 h-100 justify-content-center">
                <div class="col-lg">

                    <!-- Bordered Tabs Justified -->
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id="general-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-general" type="button" role="tab"
                                aria-controls="general" aria-selected="true">General</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="video-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-justified-video" type="button" role="tab"
                                aria-controls="video" aria-selected="false">Video</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                        <div class="tab-pane fade show active" id="bordered-justified-general" role="tabpanel"
                            aria-labelledby="general-tab">

                            <div class="form-floating mb-3">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                                    aria-describedby="">
                                <label for="title" class="form-label">Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug"
                                    aria-describedby="">
                                <label for="slug" class="form-label">Slug</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="cover" id="cover" class="form-control" placeholder="Cover"
                                    aria-describedby="">
                                <label for="cover" class="form-label">Cover</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="poster" id="poster" class="form-control"
                                    placeholder="poster" aria-describedby="">
                                <label for="poster" class="form-label">Poster</label>
                            </div>

                            <div class="form-group mb-3">
                                <label for="genres" class="form-label">Genres</label>
                                <select name="genres[]" id="genres" class="form-select col-md-4 mb-3" multiple
                                    data-placeholder="Select genres">
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="overview" class="form-control" id="overview"style="height: 100px"></textarea>
                                <label for="overview" class="form-label">Overview</label>
                            </div>

                            <input type="hidden" name="content_type" value="movie">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="release_date" id="release_date" class="form-control"
                                            placeholder="Release Year" aria-describedby="">
                                        <label for="release_date" class="form-label">Release Date</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" step=".1" min="0" max="10"
                                            name="rating" id="rating" class="form-control" placeholder="0.0"
                                            aria-describedby="">
                                        <label for="rating" class="form-label">Rating</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="duration" id="duration" class="form-control"
                                            placeholder="duration" aria-describedby="">
                                        <label for="duration" class="form-label">Duration</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="trailer" id="trailer" class="form-control"
                                    placeholder="trailer" aria-describedby="">
                                <label for="trailer" class="form-label">Trailer</label>
                            </div>
                        </div>


                        <div class="tab-pane fade mb-3" id="bordered-justified-video" role="tabpanel"
                            aria-labelledby="video-tab">
                            <button class="btn btn-primary addEvent my-3"><i class="bi bi-plus"></i>Add new</button>
                            <div class="table-responsive-sm">
                                <table class="table table-themev2 shadow-none border-gray-100 align-middle linkEvents">
                                    <thead>
                                        <tr class="text-gray-500 fs-xs">
                                            <th scope="col">Service</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">URL</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><select name="services[]" class="form-select"
                                                    aria-label="Choose Service">
                                                    <option>StreamSB</option>
                                                    <option>StreamDD</option>
                                                    <option>WorkUpload</option>
                                                </select></td>
                                            <td><select name="link_types[]" class="form-select" aria-label="Choose Type">
                                                    <option>Free</option>
                                                    <option>Premium</option>
                                                    <option>Download</option>
                                                </select></td>
                                            <td><input name="link_urls[]" class="form-control" type="text"
                                                    placeholder="URL" aria-label="default input example"></td>
                                            <td>
                                                <button class="btn btn-danger removeEvent my-3"><i
                                                        class="bi bi-dash-circle-dotted"></i></button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Bordered Tabs Justified -->
                    </div>

                </div>
                <div class="col-xl-auto">
                    <div class="mb-3">
                        <label class="form-label fs-xs" for="tmdb_id">tmDB Importer</label>
                        <input name="tmdb_id" class="form-control" type="number" id="tmdb_id"
                            placeholder="tmDB or iMDB id">
                    </div>

                    <label class="form-label">Advanced</label>
                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="publish" value="0">
                        <input name="publish" class="form-check-input" value="1" type="checkbox" role="switch"
                            id="publish">
                        <label class="form-check-label" for="publish">Publish</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="feature" value="0">
                        <input name="feature" class="form-check-input" value="1" type="checkbox" role="switch"
                            id="feature">
                        <label class="form-check-label" for="feature">Feature</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="member_only" value="0">
                        <input type="checkbox" name="member_only" value="1" class="form-check-input"
                            role="switch" id="member_only">
                        <label class="form-check-label" for="member_only">Member Only</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div.column>
                </div>
        </form>
    </div>
@endsection

@section('scripts')
    <!-- Genres Multi Select -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#genres').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>

    <!-- Slug Generator -->
    <script>
        $('#title').change(function(e) {
            $.get('{{ route('movies.checkSlug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                });
        });
    </script>

    <!-- Add/Remove Link Row -->
    <script>
        $(function() {
            let $options = $('table.linkEvents tbody');
            let index = $options.find('tr').length;
            $('.addEvent').click(function(e) {
                e.preventDefault();
                let $newRow = $options.find('tr:last').clone();
                index++;
                $newRow.appendTo($options);
            });

            $options.on('click', '.removeEvent', function(e) {
                e.preventDefault();
                if ($options.find('tr').length > 1) {
                    $(this).closest('tr').remove();
                }
            });

        });
    </script>
@endsection
