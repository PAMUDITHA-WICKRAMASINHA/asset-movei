@extends('admin.layouts.master')

@section('title', 'Add Format')

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
                    <h1 class="m-0">Add New Format</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Formats</a></li>
                        <li class="breadcrumb-item active">Add Format</li>
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
                            <form method="POST" action="{{ route('admin.add.formats') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-12">
                                        <label for="name">Format Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Format Name">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="resolution">Resolution<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="resolution" name="resolution"
                                            placeholder="Enter Resolution">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="aspect_ratio">Aspect Ratio<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="aspect_ratio" name="aspect_ratio"
                                            placeholder="Enter Aspect Ratio">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add New Format</button>
                            </form>
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