@extends('layout.master')

@section('title', 'Asset Movie - Explore International Cinema And Torrents Download Movies')

@section('meta_description', 'Asset Movie offers an extensive library of movies spanning multiple genres and languages.
Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and
download torrents directly. Whether you are a cinephile or casual viewer, Asset Movie is your go-to destination for
cinematic exploration. Discover a world of movies on Asset Movie. Browse films from various countries and
languages, and download torrents for your favorite picks.')

@section('meta_keywords', ($metaKeywords ?? "") . ', international cinema, Asset Movie, torrents downloads,
free movies,
streaming, new releases, Hollywood, Bollywood, action, comedy, drama, thriller, romance, sci-fi, horror, documentary,
foreign films')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
</noscript>

<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
</noscript>
@stop

@section('scripts')
<script src="{{ asset('assets/js/cards.js') }}"></script>
@stop

@section('content')
<div class="main_body">
    <h2>Movie List</h2>
    @include('cards.index')
</div>
@stop