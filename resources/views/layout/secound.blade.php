<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta https-equiv="content-language" content="en">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">

    <title>@yield('title', 'Asset Movies - Explore Movies and Downloads')</title>

    <meta name="description"
        content="@yield('meta_description', 'asset movies offers an extensive library of movies spanning multiple genres and languages. Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and download torrents directly. Whether you are a cinephile or casual viewer, asset movies is your go-to destination for cinematic exploration.')">
    <!-- Meta Keywords -->
    <meta name="keywords"
        content="@yield('meta_keywords', 'asset movie, asset movies, asset movie store, movies, movie, asset, movie store, movies store, stores, torrents, movie downloads, torrents downloads, free movies, movie torrents, streaming, cinema, film, new releases, Hollywood, Bollywood, action, comedy, drama, thriller, romance, sci-fi, horror, documentary, foreign films')">

    <meta name="google-site-verification" content="zUWs5NmnYms_HumIJsjqijEWCiE_0yxGldLLvq3ZNVc" />

    <style>
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: $header-footer-color;
    }

    ::-webkit-scrollbar-thumb {
        background: $red-color;
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
    @include('layout.style')
</head>


<body>
    @include('layout.header.secound')
    <div id="main">
        @yield('content')
    </div>
    @include('layout.footer.index')
    @include('layout.script')
</body>

</html>