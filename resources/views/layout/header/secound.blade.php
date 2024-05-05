<div class="text-center main_hed_sec">
    <div class="mian_data">
        <a href="/"><img src="https://yts.mx/assets/images/website/logo-YTS.svg" alt="" /></a>
        <div class="mainNav__links">
            <form action="{{ route('search') }}" method="GET" class="form">
                <button type="submit" class="hidden"><label for="search-input">
                        <i class="fa fa-search"></i>
                    </label></button>
                <input id="search-input" type="text" name="query" class="form_input" placeholder="Search movies...">

                <span class="left-pan"><i class="fa fa-microphone"></i></span>
            </form>

            <div class="dropdown">
                <button class="dropbtn">Languages <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                    @foreach ($languages as $language)
                    <a href="{{ '/movie/language/' . $language->id }}">{{$language->language}}</a>
                    @endforeach
                </div>
            </div>
            <a href="{{ '/movie/latest' }}" class="mainNav__link">Trending</a>
            <a href="{{ '/movie/latest' }}" class="mainNav__link">Latest</a>
            <a href="" class="mainNav__link">Contacts</a>
        </div>
        <div class="mainNav__icon" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </div>
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
                <a href="{{ '/movie/language/' . $language->id }}">{{$language->language}}</a>
                @endforeach
            </div>
        </div>
        <button href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</button>
        <a href="{{ '/movie/latest' }}" class="mainNav__link">Trending</a>
        <a href="{{ '/movie/latest' }}" class="mainNav__link">Latest</a>
        <a href="#" class="sidebar_mainNav__link">Contacts</a>
    </div>
</div>