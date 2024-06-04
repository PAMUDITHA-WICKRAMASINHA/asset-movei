<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    @include('admin.layouts.style')
</head>

<body>

    @include('admin.layouts.headers.index')

    <div class="wrapper">
        @include('admin.layouts.sideMenu.index')
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('admin.layouts.footers.index')

    @include('admin.layouts.script')
</body>

</html>