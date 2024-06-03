<header class="navbar navbar-dark bg-dark">
    <div>
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <span class="minimize-btn">
            <i class="fas fa-bars"></i>
        </span>
    </div>

    <div class="dropdown ml-auto">
        <button class="btn btn-secondary" type="button">
            <i class="fas fa-bell"></i>
        </button>
    </div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <!-- <a class="dropdown-item" href="#">Profile</a> -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </div>
    </div>
</header>