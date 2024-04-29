<div class="text-center main_hed_sec">
    <div class="mian_data">
        <img src="https://yts.mx/assets/images/website/logo-YTS.svg" alt="" />
        <div class="mainNav__links">
            <div class="form">
                <i class="fa fa-search"></i>
                <input type="text" class="form_input" placeholder="Search anything...">
                <span class="left-pan"><i class="fa fa-microphone"></i></span>
            </div>
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
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        <a href="#" class="sidebar_mainNav__link">Trending</a>
        <a href="#" class="sidebar_mainNav__link">Latest</a>
        <a href="#" class="sidebar_mainNav__link">Contacts</a>
    </div>
</div>