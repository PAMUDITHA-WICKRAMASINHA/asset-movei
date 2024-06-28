@extends('admin.layouts.master')

@section('title', 'Top Casts List')

@section('styles')
@vite([
'resources/views/admin/assets/css/topCastsList.css'
])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Top Casts List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Top Casts</a></li>
                        <li class="breadcrumb-item active">Top Casts List</li>
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
                            <table id="topCasts-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
<script>
$(document).ready(function() {
    $('#topCasts-list').DataTable({
        paging: true,
        lengthChange: true,
        autoWidth: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ env("APP_URL") }}/admin/get-all-topCasts',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dataSrc: function(json) {
                if (json.data) {
                    return json.data;
                } else {
                    console.error('Error loading data', json.message);
                    return [];
                }
            }
        },
        columns: [{
                title: "ID",
                data: "id"
            },
            {
                title: "Name",
                data: "name"
            },
            {
                title: "Image",
                data: "image",
                render: function(data) {
                    return `<img src="${data}" class="topCasts-image" />`;
                }
            },
            {
                title: "Created At",
                data: "created_at",
                render: function(data) {
                    return formatDateTime(data);
                }
            },
        ],
        layout: {
            topEnd: 'search',
            topStart: 'info',
            bottomStart: 'pageLength',
            bottomEnd: 'paging'
        }
    });

    function formatDateTime(dateTime) {
        const date = new Date(dateTime);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }
});
</script>
@vite([])
@stop