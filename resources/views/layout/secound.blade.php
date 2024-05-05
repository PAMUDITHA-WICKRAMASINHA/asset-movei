<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Movie - Explore Movies and Downloads')</title>
    <!-- Meta Description -->
    <meta name="description"
        content="@yield('meta_description', 'Asset Movie offers an extensive library of movies spanning multiple genres and languages. Discover blockbuster hits, indie gems, and cult classics. Dive into detailed movie descriptions, watch trailers, and download torrents directly. Whether you are a cinephile or casual viewer, Asset Movie is your go-to destination for cinematic exploration')">
    <!-- Meta Keywords -->
    <meta name="keywords"
        content="@yield('meta_keywords', 'Asset Movie, movies, torrents, movie downloads, torrents downloads, free movies, movie torrents, streaming, cinema, film, new releases, Hollywood, Bollywood, action, comedy, drama, thriller, romance, sci-fi, horror, documentary, foreign films')">
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