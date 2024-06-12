@extends('admin.layouts.master')

@section('title', 'Add Movie File')

@section('styles')
<style>
.required {
    color: red;
}
</style>
@vite([])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Torrent File for Movies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Movies</a></li>
                        <li class="breadcrumb-item active">Add File</li>
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
                            <form method="POST" action="{{ route('admin.movie.file') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane"
                                    aria-labelledby="stepper1trigger1">
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="movie">Movie Title<span class="required">*</span></label>
                                                <select class="form-control" style="width: 100%;" name="movie"
                                                    id="movie">
                                                    @foreach ($movies as $movie)
                                                    <option value="{{ $movie->id }}">{{ $movie->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="format">Movie File Format<span
                                                        class="required">*</span></label>
                                                <select class="form-control" style="width: 100%;" name="format"
                                                    id="format">
                                                    @foreach ($formats as $format)
                                                    <option value="{{ $format->id }}">{{ $format->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="disk_space">Disk Space <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="disk_space" name="disk_space"
                                                placeholder="Enter Movie Disk Space" required>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="sub_seeds">Sub Seeds<span class="required">*</span></label>
                                            <input type="text" class="form-control" id="sub_seeds" name="sub_seeds"
                                                placeholder="Enter Movie Sub Seeds" required>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="file">Torrent File<span class="required">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label" for="file">Choose
                                                    file</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Torrent File</button>
                                </div>
                            </form>
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
@vite([])
@stop