@extends('layout.master')

@section('title', 'Asset Movei | Home')

@section('styles')
    <!-- cards style -->
    <link rel="stylesheet" href="{{ asset('asset/css/cards.css') }}">
@stop


@section('scripts')
    <!-- cards js -->
    <script src="{{ asset('asset/js/cards.js') }}"></script>
@stop

@section('content')
    <!-- add cards -->
    @include('cards.index') 
@stop