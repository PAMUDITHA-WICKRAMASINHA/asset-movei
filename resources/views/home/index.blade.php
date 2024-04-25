@extends('layout.master')

@section('title', 'Asset Movie | Home')

@section('styles')
<!-- cards style -->
<link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@stop


@section('scripts')
<!-- cards js -->
<script src="{{ asset('assets/js/cards.js') }}"></script>
@stop

@section('content')
<div class="main_body">
    <!-- add cards -->
    @include('cards.index')
</div>
@stop