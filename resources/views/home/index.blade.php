@extends('layout.master')

@section('title', 'Asset Movies - Explore International Cinema And Torrents Download Movies')

@section('meta_description', 'Asset s offers an extensive library of movies spanning multiple genres and languages.
Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and
download torrents directly. Whether you are a cinephile or casual viewer, Asset Movies is your go-to destination for
cinematic exploration. Discover a world of movies on Asset Movies. Browse films from various countries and
languages, and download torrents for your favorite picks.')

@section('meta_keywords',
($metaKeywords ?? '') .
', asset movie, asset movies, asset movie store, asset movies store, asset store, movies, movie, asset, movie store,
movies store, stores, torrents, movie downloads, torrents downloads, free movies, movie torrents, streaming, cinema,
film, new releases, Hollywood, Bollywood')


@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
</noscript>

<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
</noscript>
@stop

@section('scripts')
<script src="{{ asset('assets/js/cards.js') }}"></script>
@stop

@section('content')
<div class="main_body">
    @include('cards.index')
</div>
@stop