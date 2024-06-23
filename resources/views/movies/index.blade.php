@extends('layouts.secound')

@section('title', $movie->title . ' - Watch on Asset Movies And Download Torrents Movies')

@section('meta_description', $movie->description)

@section('meta_keywords',
'watch ' . $movie->title . ', ' .
'download ' . $movie->title . ', ' .
'torrents download ' . $movie->title . ', ' .
$movie->title . ' watch' . ', ' .
$movie->title . ' download' . ', ' .
$movie->title . ' movie tailer' . ', ' .
$movie->title . ' torrents download' . ', ' .
'asset ' . $movie->title . ', ' .
'asset movie ' . $movie->title . ', ' .
'asset movies ' . $movie->title . ', ' .
'asset movie store ' . $movie->title . ', ' .
'asset movies store ' . $movie->title . ', ' .
$movie->title .' asset' . ', ' .
$movie->title . ' asset movie' . ', ' .
$movie->title . ' asset movies' . ', ' .
$movie->title . ' asset movie store' . ', ' .
$movie->title . ' asset movies store' . ', ' .
($metaKeywords ?? '') . ', ' .
'asset movie, asset movies, asset movie store, asset movies store, asset store, movies, movie, asset, movie store,
movies store, stores, torrents, movie downloads, torrents downloads, free movies, movie torrents, streaming, cinema,
film, new releases, Hollywood, Bollywood'
)

@section('meta_title', $movie->title . ' - Download Movie Torrent' . ' - Asset-Movies')
@section('meta_image', $movie->image)
@section('meta_url', url()->current())

@section('styles')
@vite([
'resources/css/movie.css'
])
@stop

@section('scripts')
<script>
$(document).ready(function() {
    $(document).on('click', '.download-link', function(event) {
        event.preventDefault();
        var formatId = $(this).data('format-id');
        var movieId = $(this).data('movie-id');

        $('#download-button').attr('href', '/movie/download/' + formatId + '/' + movieId);
        $('#myModal').show();
        var progress = 1;
        var interval = setInterval(function() {
            if (progress >= 100) {
                clearInterval(interval);
                $('#status').text('File Loading ...');
                setTimeout(function() {
                    $('#status').text('File loaded successfully !');
                    $('#download-button').show();
                }, 500);
            } else {
                progress++;
                $('#progress-bar').css('width', progress + '%').text(progress + '%');
                if (progress === 50) {
                    $('#status').text('File Loading ...');
                }
            }
        }, 100);
    });

    $('.close').on('click', function() {
        $('#myModal').hide();
    });

    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').hide();
        }
    });
});
</script>
@vite([
'resources/js/movie.js'
])
@stop

@section('content')
<div class="main_tag_movie">
    @include('movies.showMovie', ['movie' => $movie])
</div>
@stop