@extends('layout.secound')

@section('title')
{{ $movie->title }} - Watch on Asset Movie
@endsection

@section('meta_description')
{{ $movie->description }}
@endsection

@section('meta_keywords')
movie download, watch {{ $movie->title }}
@endsection

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