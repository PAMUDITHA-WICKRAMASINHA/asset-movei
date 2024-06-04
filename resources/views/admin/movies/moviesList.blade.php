@extends('admin.layouts.master')

@section('title', 'Movies List')

@section('styles')
<style>
table.dataTable td {
    text-align: left;
}

.movie-image {
    width: 50px;
    height: auto;
}

#movies-list th {
    font-weight: bold;
}

.chip {
    display: inline-block;
    padding: 2px 5px;
    margin: 3px;
    border: 1px solid #ccc;
    border-radius: 5px;
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
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#movies-list').DataTable({
        paging: true,
        lengthChange: true,
        autoWidth: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ env("APP_URL") }}/admin/get-all-movies',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
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
                data: "rate",
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
<!-- <script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script> -->
@vite([])
@stop