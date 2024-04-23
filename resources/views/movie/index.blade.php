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
            <div>
                @foreach ($movie->categories as $category)
                <span class="category-card">{{$category->categoty}}</span>
                @endforeach
            </div>
            <div class="button_trailer">
                <a href="{{ ($movie->trailer) }}" target="_blank" class="button">Watch Trailer</a>
                <button>Download</button>
            </div>
            <p class="movie_de">{{$movie->description}}</p>
        </div>
        <div class="section similar-data">
            <h5>Similar Movies</h5>
            <div>
                @foreach ($latestMovies as $index => $latestMovie)
                @if ($index
                < 2) <img class="similar_emt_image" src="{{ Storage::url($latestMovie->image) }}" alt="" />
                @else
                @break
                @endif
                @endforeach
            </div>
            <hr />
            <div>
                @foreach ($latestMovies as $index => $latestMovie)
                @if ($index >= 2 && $index
                <= 3) <img class="similar_emt_image" src="{{ Storage::url($latestMovie->image) }}" alt="" />
                @endif
                @endforeach
            </div>

        </div>
    </div>
    <div class="container-next">
        <div class="section">
            <div class="movie-table">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>File Format</th>
                            <th>Disk Space</th>
                            <th>Resolution</th>
                            <th>Aspect Ratio</th>
                            <th>Duration</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movie->formats as $format)
                        <tr>
                            <th scope="row">{{ $format->name }}</th>
                            <td>{{ $format->pivot->disk_space }}</td>
                            <td>{{ $format->resolution }}</td>
                            <td>{{ $format->aspect_ratio }}</td>
                            <td>{{ $movie->duration }}</td>
                            <td><a href="{{ url('storage/' . $format->pivot->file) }}" class="movie-download"> Download
                                    Now</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section">
            <div>
                <h5>Directors</h5>
                <div class="movie-sub-container">
                    @foreach ($movie->directors as $director)
                    <img class="movie-sub-img" src="{{ Storage::url($director->image) }}" alt="Directors">
                    <p class="movie-sub-name">{{$director->name}}</p>
                    <hr />
                    @endforeach
                </div>

            </div>

            <div>
                <h5>Top casts</h5>
                <div class="movie-sub-container">
                    @foreach ($movie->top_casts as $top_cast)
                    <img class="movie-sub-img" src="{{ Storage::url($top_cast->image) }}" alt="Top casts">
                    <p class="movie-sub-name">{{$top_cast->name}}</p>
                    <hr />
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>


@stop