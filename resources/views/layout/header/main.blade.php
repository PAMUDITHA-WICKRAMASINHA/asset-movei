<div class="text-center main_hed">
    <div class="mian_data">
        <img src="https://yts.mx/assets/images/website/logo-YTS.svg" alt="" />
        <div class="mainNav__links">
            <a href="" class="mainNav__link">Trending</a>
            <a href="" class="mainNav__link">Latest</a>
            <a href="" class="mainNav__link">Contacts</a>
        </div>
        <!-- <div class="search">
                <input type="text" placeholder="search" />
                <div class="symbol">
                    <svg class="cloud">
                        <use xlink:href="#cloud" />
                    </svg>
                    <svg class="lens">
                        <use xlink:href="#lens" />
                    </svg>
                </div>
            </div> -->
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
                    <h1><b>{{$movie->title}}</b></h1>
                    <p class="movie_de">{{$movie->description}}</p>
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
                        <button id="more-movie-button" data-id="{{ $movie->id }}">More
                            Details</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        <a href="#" class="sidebar_mainNav__link">Trending</a>
        <a href="#" class="sidebar_mainNav__link">Latest</a>
        <a href="#" class="sidebar_mainNav__link">Contacts</a>
    </div>
</div>