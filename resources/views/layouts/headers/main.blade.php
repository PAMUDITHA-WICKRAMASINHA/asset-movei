<div class="text-center main_hed">
    <div class="mian_data">
        <div class="main_logo_div">
            <a href="/"><img class="main_logo" src="{{ route('showMainImage', ['filename' => 'logo.webp']) }}"
                    alt="" /></a>
            <header class="logo_name_head">
                <h1 href="/" class="logo_name">Asset Movies</h1>
            </header>
        </div>

        <div class="mainNav__links">
            <form action="{{ route('search') }}" method="GET" class="form">
                <button type="submit" class="hidden"><label for="search-input">
                        <i class="fa fa-search"></i>
                    </label></button>
                <input id="search-input" type="text" name="query" class="form_input" placeholder="Search movies...">
                <button type="submit" class="hidden"></button>
                <span class="left-pan"><i class="fa fa-microphone"></i></span>
            </form>
            <div class="dropdown">
                <button class="dropbtn">Languages <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                    @foreach ($languages as $language)
                    <a href="{{ '/movie/language?id=' . $language->id }}">{{$language->language}}</a>
                    @endforeach
                </div>
            </div>
            <a href="{{ '/movie/latest' }}" class="mainNav__link">Trending</a>
            <a href="{{ '/movie/latest' }}" class="mainNav__link">Latest</a>
            <a href="" class="mainNav__link">Contacts</a>
        </div>
        <div class="mainNav__icon" id="openSidebar">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div>
        @foreach ($movies as $movie)
        <div class="hed_dics slide">
            <div class="container-data">
                <div class="hed_dics_col_left">
                    <img class="main_emt_image" src="{{ url($movie->image) }}" alt="" />
                </div>
                <div class="hed_dics_col_right">
                    <p><b>{{ date('Y', strtotime($movie->release_date)) }}</b></p>
                    <p class="movie_title_name">
                        <b>{{ strlen($movie->title) > 25 ? substr($movie->title, 0, 25) . '...' : $movie->title }}</b>
                    </p>
                    <p class="movie_de">
                        {{ strlen($movie->description) > 100 ? substr($movie->description, 0, 100) . '...' : $movie->description }}
                    </p>
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
                    <div class="button_trailer">
                        <a href="{{ ($movie->trailer) }}" target="_blank" class="button">Watch Trailer</a>
                        <a href="{{ '/get-movie/' . $movie->id }}" class="button">More Details</a>
                    </div>

                </div>
                <div class="row main_row">
                    <div class="col-4">
                        <img class="main_emt_image_right" src="{{ url($movie->image) }}" alt="" />
                    </div>
                    <div class="col-8 mobile_col_right">
                        <p><b>{{ date('Y', strtotime($movie->release_date)) }}</b></p>
                        <p class="movie_title_name">
                            <b>{{ strlen($movie->title) > 25 ? substr($movie->title, 0, 25) . '...' : $movie->title }}</b>
                        </p>
                        <p class="movie_de">
                            {{ strlen($movie->description) > 100 ? substr($movie->description, 0, 100) . '...' : $movie->description }}
                        </p>
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
                        <div class="button_trailer">
                            <a href="{{ ($movie->trailer) }}" target="_blank" class="button">Watch Trailer</a>
                            <a href="{{ '/get-movie/' . $movie->id }}" class="button">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="sidebar" id="sidebar">
        <form action="{{ route('search') }}" method="GET" class="form_nav">
            <button type="submit" class="hidden"><label for="search-input">
                    <i class="fa fa-search"></i>
                </label></button>
            <input id="search-input" type="text" name="query" class="form_input" placeholder="Search movies...">
            <button type="submit" class="hidden"></button>
            <span class="left-pan"><i class="fa fa-microphone"></i></span>
        </form>
        <div class="dropdown">
            <button class="dropbtn-nav" id="dropbtn-nav">Languages <i class="fa fa-caret-down"
                    aria-hidden="true"></i></button>
            <div class="dropdown-content-nav">
                @foreach ($languages as $language)
                <a href="{{ '/movie/language?id=' . $language->id }}">{{$language->language}}</a>
                @endforeach
            </div>
        </div>
        <button href="javascript:void(0)" class="closebtn">×</button>
        <a href="{{ '/movie/latest' }}" class="sidebar_mainNav__link">Trending</a>
        <a href="{{ '/movie/latest' }}" class="sidebar_mainNav__link">Latest</a>
        <a href="#" class="sidebar_mainNav__link">Contacts</a>
    </div>
</div>