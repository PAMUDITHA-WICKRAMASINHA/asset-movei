@extends('admin.master') @section('title', 'Asset Movie | Admin')
@section('admin_styles')
<!-- cards style -->
<link rel="stylesheet" href="{{ asset('asset/css/admin_movie.css') }}" />
@stop @section('admin_scripts')
<!-- cards js -->
<script src="{{ asset('asset/js/admin_movie.js') }}"></script>
@stop @section('admin_content')
<div class="container mt-5">
    <div class="justify-content-center">
        <form action="{{ url('/admin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="main_frame">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group input-form">
                            <label for="title" class="name-input">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required />
                        </div>
                        <div class="form-group input-form">
                            <label for="duration" class="name-input">Duration:</label>
                            <input type="time" class="form-control" id="duration" name="duration" required />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group input-form">
                            <label for="image" class="name-input">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required />
                        </div>
                        <div class="form-group input-form">
                            <label for="release_date" class="name-input">Release Date:</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group input-form">
                            <label for="director" class="name-input">Director:</label>
                            <select class="form-control" id="director" name="director">
                                <option value="">Select Director</option>
                                @foreach($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="selected-directors"></div>
                        <div class="form-group input-form">
                            <label for="category" class="name-input">Category:</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="selected-categories"></div>
                    </div>
                    <div class="col-6">
                        <div class="form-group input-form">
                            <label for="top_cast" class="name-input">Top Cast Name:</label>
                            <select class="form-control" id="top_cast" name="top_cast">
                                <option value="">Select Top Cast</option>
                                @foreach($top_casts as $top_cast)
                                <option value="{{ $top_cast->id }}">{{ $top_cast->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-form">
                            <label for="trailer" class="name-input">Trailer:</label>
                            <input type="url" class="form-control" id="trailer" name="trailer" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group input-form">
                        <label for="description" class="name-input">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" />
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop