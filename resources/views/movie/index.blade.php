@extends('layout.secound')

@section('title', $movie->title . ' - Watch on Asset Movies And Download Torrents Movies')

@section('meta_description', $movie->description)

@section('meta_keywords',
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
'watch ' . $movie->title . ', ' .
'download ' . $movie->title . ', ' .
'torrents download ' . $movie->title . ', ' .
($metaKeywords ?? '') . ', ' .
'asset movie, asset movies, asset movie store, asset movies store, asset store, movies, movie, asset, movie store,
movies store, stores, torrents, movie downloads, torrents downloads, free movies, movie torrents, streaming, cinema,
film, new releases, Hollywood, Bollywood'
)



@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/movie.css') }}">
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/movie.css') }}">
</noscript>
@stop

@section('scripts')
<script src="{{ asset('assets/js/movie.js') }}"></script>
@stop

@section('content')
<div class="main_tag_movie">
    @include('movie.showMovie', ['movie' => $movie])
</div>
@stop