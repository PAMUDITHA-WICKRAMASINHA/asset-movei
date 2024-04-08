@extends('layout.master')

@section('title', 'Asset Movie | Home')

@section('styles')
<!-- cards style -->
<link rel="stylesheet" href="{{ asset('asset/css/cards.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
@stop


@section('scripts')
<!-- cards js -->
<script src="{{ asset('asset/js/cards.js') }}"></script>
@stop

@section('content')
<div class="main_body">
    <!-- add cards -->
    @include('cards.index')
</div>
@stop