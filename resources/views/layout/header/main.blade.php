<div class="text-center main_hed">
    <div class="mian_data">
        <a href="/"><img src="https://yts.mx/assets/images/website/logo-YTS.svg" alt="" /></a>
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
                    <a href="">{{$language->language}}</a>
                    @endforeach
                </div>
            </div>
            <a href="" class="mainNav__link">Trending</a>
            <a href="" class="mainNav__link">Latest</a>
            <a href="" class="mainNav__link">Contacts</a>
        </div>
        <div class="mainNav__icon" onclick="toggleSidebar()">
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
                    <h1><b>{{ strlen($movie->title) > 25 ? substr($movie->title, 0, 25) . '...' : $movie->title }}</b>
                    </h1>
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
                            <p>6.3/10</p>
                        </div>
                    </div>
                    <div class="button_trailer">
                        <a href="{{ ($movie->trailer) }}" target="_blank" class="button">Watch Trailer</a>
                        <a href="{{ '/get-movie/' . $movie->id }}" class="button">More Details</a>
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
                <a href="">{{$language->language}}</a>
                @endforeach
            </div>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        <a href="#" class="sidebar_mainNav__link">Trending</a>
        <a href="#" class="sidebar_mainNav__link">Latest</a>
        <a href="#" class="sidebar_mainNav__link">Contacts</a>
    </div>
</div>