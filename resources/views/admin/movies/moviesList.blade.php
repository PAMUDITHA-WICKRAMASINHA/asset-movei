@extends('admin.layouts.master')

@section('title', 'Movies List')

@section('styles')
@vite([
'resources/views/admin/assets/css/moviesList.css'
])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Movies List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Movies</a></li>
                        <li class="breadcrumb-item active">Movies List</li>
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
                            <table id="movies-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Trailer</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                        <th>Download Count</th>
                                        <th>Movie Release Date</th>
                                        <th>Categories</th>
                                        <th>Top Casts</th>
                                        <th>Directors</th>
                                        <th>Languages</th>
                                        <th>Format</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
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
    $('#movies-list').DataTable({
        paging: true,
        lengthChange: true,
        autoWidth: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ env("APP_URL") }}/admin/get-all-movies',
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
                title: "Title",
                data: "title"
            },
            {
                title: "Image",
                data: "image",
                render: function(data) {
                    return `<img src="${data}" class="movie-image" />`;
                }
            },
            {
                title: "Trailer",
                data: "trailer",
                render: function(data) {
                    return `<a href="${data}" target="_blank">Watch Trailer</a>`;
                }
            },
            {
                title: "Duration",
                data: "duration",
            },
            {
                title: "Rate",
                data: function(data) {
                    return `<span class="badge bg-primary">${data.rate}/10</span>`;
                }
            },
            {
                title: "Download Count",
                data: "download_count",
            },
            {
                title: "Movie Release Date",
                data: "release_date",
            },
            {
                title: "Categories",
                data: function(row) {
                    return row.categories.map(category =>
                            `<span class="chip chip-category">${category.category}</span>`)
                        .join(' ');
                }
            },
            {
                title: "Top Casts",
                data: function(row) {
                    return row.top_casts.map(cast =>
                        `<span class="chip chip-cast">${cast.name}</span>`).join(' ');
                }
            },
            {
                title: "Directors",
                data: function(row) {
                    return row.directors.map(director =>
                        `<span class="chip chip-director">${director.name}</span>`).join(
                        ' ');
                }
            },
            {
                title: "Languages",
                data: function(row) {
                    return row.languages.map(language =>
                            `<span class="chip chip-language">${language.language}</span>`)
                        .join(' ');
                }
            },
            {
                title: "Format",
                data: function(row) {
                    return row.formats.map(format =>
                            `<span class="chip chip-language">${format.name} (${format.pivot.disk_space})</span>`
                        )
                        .join(' ');
                }
            },
            {
                title: "Status",
                data: 'status',
                render: function(data) {
                    let badgeClass = data ? 'badge-success' : 'badge-danger';
                    let statusText = data ? 'Active' : 'Inactive';
                    return `<span class="badge ${badgeClass}">${statusText}</span>`;
                }
            },
            {
                title: "Created At",
                data: "created_at",
                render: function(data) {
                    return formatDateTime(data);
                }
            },
            {
                title: "Action",
                data: null,
                orderable: false,
                searchable: false,
                render: function(data) {
                    return `<div class="btn-group btn-group-sm">
                    <a href="/admin/movies-edit/${data.id}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </div>`;
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