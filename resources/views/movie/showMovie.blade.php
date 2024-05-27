<div class="container-dev">
    <div class="section">
        <img class="emt_image" src="{{ url($movie->image) }}" alt="" />
    </div>
    <div class="section">
        <div class="movie_detail">
            <h2><b>{{ date('Y', strtotime($movie->release_date)) }}</b></h2>
            <h1><b>{{$movie->title}}</b></h1>
            <div class="icon_infor">
                <div class="time">
                    <i class="fa-solid fa-stopwatch"></i>
                    <p>{{$movie->duration}}</p>
                </div>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <p>{{$movie->rate}}/10</p>
                </div>
            </div>
            <div>
                @foreach ($movie->categories as $category)
                <span class="category-card">{{$category->category}}</span>
                @endforeach
            </div>
            <div class="button_trailer">
                <a href="{{ ($movie->trailer) }}" target="_blank" class="button">Watch Trailer</a>
                <button>Download</button>
            </div>
            <p class="movie_des">{{$movie->description}}</p>
        </div>
    </div>
    <div class="section similar-data">
        <h5>Similar Movies</h5>
        <div>
            @foreach ($latestMovies as $index => $latestMovie)
            @if ($index
            < 2) <a href="/get-movie/{{ $latestMovie->id }}">
                <img class="similar_emt_image" src="{{ url($latestMovie->image) }}" alt="" />
                </a>
                @else
                @break
                @endif
                @endforeach
        </div>
        <hr />
        <div>
            @foreach ($latestMovies as $index => $latestMovie)
            @if ($index >= 2 && $index
            <= 3) <img class="similar_emt_image" src="{{ url($latestMovie->image) }}" alt="" />
            @endif
            @endforeach
        </div>

    </div>
</div>
<div class="container-next">
    <div class="section">
        <div class="movie-spec-format">
            <nav>
                <div class="nav nav-tabs nav-fill">
                    @foreach ($movie->formats as $key => $format)
                    <a class="nav-item nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                        href="#{{ $format->id }}">
                        {{ $format->name }}
                    </a>
                    @endforeach
                </div>
            </nav>
            <div class="format_tab">
                <div class="tab-content py-3 px-3 px-sm-0">
                    @foreach ($movie->formats as $key => $format)
                    <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="{{ $format->id }}">
                        <div class="spec_row_format">
                            <div class="format-spec"><i class="fa fa-folder-open" aria-hidden="true"></i></i>
                                {{ $format->pivot->disk_space }}</div>
                            <div class="format-spec"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                {{ $format->resolution }}</div>
                            <div class="format-spec"><i class="fa fa-desktop" aria-hidden="true"></i>
                                {{ $format->aspect_ratio }}</div>
                            <div class="format-spec"><i class="fa-solid fa-stopwatch" aria-hidden="true"></i>
                                {{ $movie->duration }}</div>
                            <div class="format-spec"><a href="{{ route('download', $format->pivot->format_id) }}"
                                    class="movie-download">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download
                                    Now</a></div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div>
            <h5>Directors</h5>
            <div class="movie-sub-container">
                @foreach ($movie->directors as $director)
                <img class="movie-sub-img" src="{{ url($director->image) }}" alt="Directors">
                <p class="movie-sub-name">{{$director->name}}</p>
                <hr />
                @endforeach
            </div>

        </div>

        <div>
            <h5>Top casts</h5>
            <div class="movie-sub-container">
                @foreach ($movie->top_casts as $top_cast)
                <img class="movie-sub-img" src="{{ url($top_cast->image) }}" alt="Top casts">
                <p class="movie-sub-name">{{$top_cast->name}}</p>
                <hr />
                @endforeach
            </div>
        </div>

    </div>
</div>