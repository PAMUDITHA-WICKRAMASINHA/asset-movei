@extends('admin.layouts.master')

@section('title', 'Edit Movie')

@section('styles')
<style>
.required {
    color: red;
}
</style>
<!-- Duallistbox CSS -->
<link href="https://cdn.rawgit.com/istvan-ujjmeszaros/bootstrap-duallistbox/master/src/bootstrap-duallistbox.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@vite([])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modify Movie</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Movies</a></li>
                        <li class="breadcrumb-item active">Edit Movie</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="stepper-movie" class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                            aria-controls="test-l-1">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Movie Details</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                            aria-controls="test-l-2">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Directors</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                                            aria-controls="test-l-3">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Top Casts</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-4">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                                            aria-controls="test-l-4">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Categories</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-5">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger5"
                                            aria-controls="test-l-5">
                                            <span class="bs-stepper-circle">5</span>
                                            <span class="bs-stepper-label">Languages</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-6">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger6"
                                            aria-controls="test-l-6">
                                            <span class="bs-stepper-circle">6</span>
                                            <span class="bs-stepper-label">Torrent Files</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <form method="POST" action="{{ route('admin.edit.movie', ['id' => $movie->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger1">
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12">
                                                    <label for="title">Title<span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        value="{{ $movie->title }}" placeholder="Enter Movie Title">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="duration">Duration<span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control" id="duration"
                                                        name="duration" value="{{ $movie->duration }}"
                                                        placeholder="Enter Movie Duration (1 hr 10 min)">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="release_date">Release Date<span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control" id="release_date"
                                                        name="release_date" value="{{ $movie->release_date }}"
                                                        placeholder="Enter Movie Relese Date (2024-01-01)">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="rate">Rate<span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="rate" name="rate"
                                                        value="{{ $movie->rate }}" placeholder="Enter Movie Rate">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="trailer">Trailer<span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="trailer" name="trailer"
                                                        value="{{ $movie->trailer }}" placeholder="Enter Movie Trailer">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="image">Image<span class="required">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image" accept="image/*">
                                                        <label class="custom-file-label" for="image">Choose
                                                            Movie Image</label>
                                                        <p id="image-name" class="mt-3"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Description<span class="required">*</span></label>
                                                    <textarea class="form-control" rows="3" id="description"
                                                        name="description"
                                                        placeholder="Enter Movie Description ...">{{ $movie->description }}</textarea>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <img src="{{ $movie->image }}" class="card-img-top mt-4"
                                                        alt="Placeholder Image" style="width: 150px; height: 200px;">

                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger2">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($directors) }}"
                                                    name="director[]" id="director">
                                                    @foreach ($directors as $director)
                                                    <option value="{{ $director->id }}" @if(in_array($director->id,
                                                        $movie->directors->pluck('id')->toArray())) selected @endif>
                                                        {{ $director->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="no-director"
                                                    name="no-director">
                                                <label class="form-check-label" for="no-director">Directors Not
                                                    Available</label>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger3">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($top_casts) }}"
                                                    name="top_cast[]" id="top_cast">
                                                    @foreach ($top_casts as $top_cast)
                                                    <option value="{{ $top_cast->id }}" @if(in_array($top_cast->id,
                                                        $movie->top_casts->pluck('id')->toArray())) selected @endif>
                                                        {{ $top_cast->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="no-top-casts"
                                                    name="no-top-casts">
                                                <label class="form-check-label" for="no-top-casts">Top Casts Not
                                                    Available</label>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-4" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger4">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($categories) }}"
                                                    name="category[]" id="category">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if(in_array($category->id,
                                                        $movie->categories->pluck('id')->toArray())) selected @endif>
                                                        {{ $category->category }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-5" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger5">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($languages) }}"
                                                    name="language[]" id="language">
                                                    @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}" @if(in_array($language->id,
                                                        $movie->languages->pluck('id')->toArray())) selected @endif>
                                                        {{ $language->language }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-6" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger6">

                                            <div class="form-group row">
                                                @foreach ($movie->formats as $format)
                                                <div class="col-md-6 col-12">
                                                    <label for="file-{{ $format->id }}">Torrent File:
                                                        {{ $format->name }}<span class="required">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="file-{{ $format->id }}" name="file[{{ $format->id }}]"
                                                            accept=".torrent">
                                                        <label class="custom-file-label"
                                                            for="file-{{ $format->id }}">Choose Movie Torrent
                                                            File</label>
                                                        <p id="file-name-{{ $format->id }}" class="mt-3"></p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button class="btn btn-primary" type="submit">Add Movie</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop

@section('scripts')
<script src="/assets/js/addMovie.js"></script>
<!-- Duallistbox JS -->
<script
    src="https://cdn.rawgit.com/istvan-ujjmeszaros/bootstrap-duallistbox/master/src/jquery.bootstrap-duallistbox.js">
</script>

<script>
$(document).ready(function() {
    $('#director').bootstrapDualListbox({
        nonSelectedListLabel: 'All Directors',
        selectedListLabel: 'Selected Directors',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#top_cast').bootstrapDualListbox({
        nonSelectedListLabel: 'All Top Casts',
        selectedListLabel: 'Selected Top Casts',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#category').bootstrapDualListbox({
        nonSelectedListLabel: 'All Categories',
        selectedListLabel: 'Selected Categories',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#language').bootstrapDualListbox({
        nonSelectedListLabel: 'All Languages',
        selectedListLabel: 'Selected Languages',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });
});
$(document).ready(function() {
    $('#image').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
        $('#image-name').text('Selected Image: ' + fileName);
    });

    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-torrent-file-label').html(fileName);
            $('#file-name-' + $(this).attr('id').split('-')[1]).text('Selected File: ' +
                fileName);
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@vite([])
@stop