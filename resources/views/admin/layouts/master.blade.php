<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Movies | @yield('title')</title>

    @include('admin.layouts.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.headers.index')

        @include('admin.layouts.sideMenu.index')

        @yield('content')

        @include('admin.layouts.footers.index')
    </div>

    @include('admin.layouts.script')
</body>

</html>