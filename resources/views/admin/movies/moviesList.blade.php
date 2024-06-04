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
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-md-start">
                                <div class="col-12 d-flex justify-content-md-start">
                                    <h2>Movies list</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-block table-border-style overflow-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 table-start">
                                        <table id="movies-list" class="display" style="width:100%">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
// $(document).ready(function() {
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');

//     $('#movies-list').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: {
//             url: '{{ env("APP_URL") }}/admin/get-all-movies',
//             type: 'GET',
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             },
//             dataSrc: function(json) {
//                 if (json.data) {
//                     return json.data;
//                 } else {
//                     console.error('Error loading data', json.message);
//                     return [];
//                 }
//             }
//         },
//         columns: [{
//                 title: "ID",
//                 data: "id"
//             },
//             {
//                 title: "Title",
//                 data: "title"
//             },
//             {
//                 title: "Image",
//                 data: "image",
//                 render: function(data) {
//                     return `<img src="${data}" class="movie-image" />`;
//                 }
//             },
//             {
//                 title: "Trailer",
//                 data: "trailer",
//                 render: function(data) {
//                     return `<a href="${data}" target="_blank">Watch Trailer</a>`;
//                 }
//             },
//             {
//                 title: "Duration",
//                 data: "duration",
//             },
//             {
//                 title: "Rate",
//                 data: "rate",
//             },
//             {
//                 title: "Download Count",
//                 data: "download_count",
//             },
//             {
//                 title: "Movie Release Date",
//                 data: "release_date",
//             },
//             {
//                 title: "Categories",
//                 data: function(row) {
//                     return row.categories.map(category =>
//                             `<span class="chip chip-category">${category.category}</span>`)
//                         .join(' ');
//                 }
//             },
//             {
//                 title: "Top Casts",
//                 data: function(row) {
//                     return row.top_casts.map(cast =>
//                         `<span class="chip chip-cast">${cast.name}</span>`).join(' ');
//                 }
//             },
//             {
//                 title: "Directors",
//                 data: function(row) {
//                     return row.directors.map(director =>
//                         `<span class="chip chip-director">${director.name}</span>`).join(
//                         ' ');
//                 }
//             },
//             {
//                 title: "Languages",
//                 data: function(row) {
//                     return row.languages.map(language =>
//                             `<span class="chip chip-language">${language.language}</span>`)
//                         .join(' ');
//                 }
//             },

//             {
//                 title: "Created At",
//                 data: "created_at",
//                 render: function(data) {
//                     return formatDateTime(data);
//                 }
//             },
//         ],
//         layout: {
//             topEnd: 'search',
//             topStart: 'info',
//             bottomStart: 'pageLength',
//             bottomEnd: 'paging'
//         }
//     });

//     function formatDateTime(dateTime) {
//         const date = new Date(dateTime);
//         const year = date.getFullYear();
//         const month = String(date.getMonth() + 1).padStart(2, '0');
//         const day = String(date.getDate()).padStart(2, '0');
//         const hours = String(date.getHours()).padStart(2, '0');
//         const minutes = String(date.getMinutes()).padStart(2, '0');
//         const seconds = String(date.getSeconds()).padStart(2, '0');
//         return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
//     }
// });
</script>
@vite([])
@stop