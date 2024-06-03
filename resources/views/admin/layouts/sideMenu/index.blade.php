<div class="wrapper">
    <div class="sidebar" id="sidebar">
        <!-- <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Menu</h2>
            <span class="minimize-btn">
                <i class="fas fa-bars"></i>
            </span>
        </div> -->
        <a href="#"><i class="fas fa-tachometer-alt"></i><span class="ml-2">Dashboard</span></a>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="movies-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Movies</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="movies-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Movies
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Movie</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Files</span></a>
        </div>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="directors-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Directors</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="directors-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Directors
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Director</span></a>
        </div>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="top-casts-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Top Casts</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="top-casts-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Top Casts
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Top Cast</span></a>
        </div>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="categories-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Categories</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="categories-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Categories
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Category</span></a>
        </div>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="languages-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Languages</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="languages-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Languages
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Language</span></a>
        </div>
        <a href="#" class="d-flex justify-content-between align-items-center submenu-item"
            data-submenu-id="format-submenu">
            <div>
                <i class="fas fa-users submenu-icon"></i><span class="ml-2">Formats</span>
            </div>
            <i class="fas fa-chevron-down submenu-toggle"></i>
        </a>
        <div id="format-submenu" class="submenu">
            <a href="#" class="submenu-item"><i class="fas fa-list submenu-icon"></i><span class="ml-2">Formats
                    List</span></a>
            <a href="#" class="submenu-item"><i class="fas fa-user-plus submenu-icon"></i><span class="ml-2">Add
                    Format</span></a>
        </div>
        <!-- <a href="#" class="submenu-item"><i class="fas fa-cogs submenu-icon"></i><span class="ml-2">Settings</span></a> -->
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>