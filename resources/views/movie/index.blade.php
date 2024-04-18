@extends('layout.secound')

@section('title', 'Asset Movie')

@section('styles')
<link rel="stylesheet" href="{{ asset('asset/css/movie.css') }}">
@stop


@section('scripts')
@stop

@section('content')
<div class="main_tag_movie">
    <div class="container-dev">
        <div class="section">
            <img class="emt_image" src="{{ Storage::url($movie->image) }}" alt="" />
        </div>
        <div class="section">
            <h2><b>{{ date('Y', strtotime($movie->release_date)) }}</b></h2>
            <h1><b>{{$movie->title}}</b></h1>
            <div class="icon_infor">
                <div class="time">
                    <i class="fa-solid fa-stopwatch"></i>
                    <p>{{$movie->duration}}</p>
                </div>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <p>6.3/10</p>
                </div>
            </div>
            <div class="button_trailer">
                <button>Watch Trailer</button>
                <button>Download</button>
            </div>
            <p class="movie_de">{{$movie->description}}</p>
        </div>
        <div class="section similar-data">
            <h5>Similar Movies</h5>
            <div>
                <img class="similar_emt_image" src="{{ Storage::url($movie->image) }}" alt="" />
                <img class="similar_emt_image" src="{{ Storage::url($movie->image) }}" alt="" />
            </div>
            <hr />
            <div>
                <img class="similar_emt_image" src="{{ Storage::url($movie->image) }}" alt="" />
                <img class="similar_emt_image" src="{{ Storage::url($movie->image) }}" alt="" />
            </div>

        </div>
    </div>
    <div class="container-next">
        <div class="section">
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        </div>
        <div class="section">
            <div>
                <h5>Directors</h5>
                <div class="movie-sub-container">
                    <img class="movie-sub-img" src="https://img.yts.mx/assets/images/actors/thumb/nm0272581.jpg"
                        alt="Rebecca Ferguson Photo">
                    <p class="movie-sub-name">Rebecca Ferguson as Jessica</p>
                    <hr />
                </div>

            </div>

            <div>
                <h5>Top casts</h5>

                <div class="movie-sub-container">
                    <img class="movie-sub-img" src="https://img.yts.mx/assets/images/actors/thumb/nm0272581.jpg"
                        alt="Rebecca Ferguson Photo">
                    <p class="movie-sub-name">Rebecca Ferguson as Jessica</p>
                    <hr />
                </div>
                <div class="movie-sub-container">
                    <img class="movie-sub-img" src="https://img.yts.mx/assets/images/actors/thumb/nm0272581.jpg"
                        alt="Rebecca Ferguson Photo">
                    <p class="movie-sub-name">Rebecca Ferguson as Jessica</p>
                    <hr />
                </div>
                <div class="movie-sub-container">
                    <img class="movie-sub-img" src="https://img.yts.mx/assets/images/actors/thumb/nm0272581.jpg"
                        alt="Rebecca Ferguson Photo">
                    <p class="movie-sub-name">Rebecca Ferguson as Jessica</p>
                    <hr />
                </div>
            </div>

        </div>
    </div>
</div>


@stop