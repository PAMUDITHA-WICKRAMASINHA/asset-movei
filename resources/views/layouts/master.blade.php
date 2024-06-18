<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta https-equiv="content-language" content="en">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">

    <title>@yield('title', 'Asset Movies - Download Latest Movie Torrents')</title>

    <!-- Meta Description -->
    <meta name="description"
        content="@yield('meta_description', 'asset movies offers an extensive library of movies spanning multiple genres and languages. Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and download torrents directly. Whether you are a cinephile or casual viewer, asset movies is your go-to destination for cinematic exploration.')">
    <!-- Meta Keywords -->
    <meta name="keywords"
        content="@yield('meta_keywords', 'asset movie, asset movies, asset movie store, asset movies store, asset store, movies, movie, asset, movie store, movies store, stores, torrents, movie downloads, torrents downloads, free movies, movie torrents, cinema, film, new releases, Hollywood, Bollywood')">

    <meta name="google-site-verification" content="zUWs5NmnYms_HumIJsjqijEWCiE_0yxGldLLvq3ZNVc" />

    <meta property="og:title" content="Download Movie Torrent - Asset-Movies">
    <meta property="og:image" content="{{ route('showMainImage', ['filename' => 'logo_back.webp']) }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="icon" type="image/webp" href="{{ route('showMainImage', ['filename' => 'logo_back.webp']) }}">
    <link rel="shortcut icon" type="image/webp" href="{{ route('showMainImage', ['filename' => 'logo_back.webp']) }}">

    <style>
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: rgb(0, 0, 0);
    }

    ::-webkit-scrollbar-thumb {
        background: rgb(255, 255, 255);
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgb(220, 0, 0);
    }

    * {
        margin: 0;
        padding: 0;
        list-style: none;
        border: 0;
        outline: 0;
        -webkit-tap-highlight-color: transparent;
        text-decoration: none;
        color: inherit;
        box-sizing: border-box;
    }

    *:focus {
        outline: 0;
    }

    body {
        font-family: "Raleway", sans-serif;
    }
    </style>
    @include('layouts.style')
</head>

<body>
    @include('layouts.headers.main')
    <div id="main">
        @yield('content')
    </div>
    @include('layouts.footers.index')
    @include('layouts.script')
</body>

</html>