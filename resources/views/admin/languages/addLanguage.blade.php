@extends('admin.layouts.master')

@section('title', 'Add Language')

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
                    <h1 class="m-0">Add New Language</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Languages</a></li>
                        <li class="breadcrumb-item active">Add Language</li>
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
                            <form method="POST" action="{{ route('admin.add.languages') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-12">
                                        <label for="language">Language<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="language" name="language"
                                            placeholder="Enter Language">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add New Language</button>
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