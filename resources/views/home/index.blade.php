@extends('layout.master')

@section('title', 'Asset Movie - Explore International Cinema And Download Movies')

@section('meta_description', 'Discover a world of movies on Asset Movie. Browse films from various countries and
languages, and download torrents for your favorite picks.')
@section('meta_keywords', $metaKeywords . ', international cinema, movie torrents, multilingual films, foreign movies
download, Asset Movie')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@stop

@section('scripts')
<script src="{{ asset('assets/js/cards.js') }}"></script>
@stop

@section('content')
<div class="main_body">
    @include('cards.index')
</div>
@stop