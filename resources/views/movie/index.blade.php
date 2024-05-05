@extends('layout.secound')

@section('title', $movie->title . ' - Watch on Asset Movie And Download Torrents Movies')

@section('meta_description', $movie->description . 'Asset Movie offers an extensive library of movies spanning multiple
genres and languages.
Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and
download torrents directly. Whether you are a cinephile or casual viewer, Asset Movie is your go-to destination for
cinematic exploration. Discover a world of movies on Asset Movie. Browse films from various countries and
languages, and download torrents for your favorite picks.')

@section('meta_keywords', 'watch' . $movie->title . 'download' . $movie->title . 'torrents download' . $movie->title .
$metaKeywords . ',international cinema,
Asset Movie, torrents
downloads, free movies,
streaming, new releases, Hollywood, Bollywood, action, comedy, drama, thriller, romance, sci-fi, horror, documentary,
foreign films')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/movie.css') }}">
@stop

@section('scripts')
<script src="{{ asset('assets/js/movie.js') }}"></script>
@stop

@section('content')
<div class="main_tag_movie">
    @include('movie.showMovie', ['movie' => $movie])
</div>
@stop