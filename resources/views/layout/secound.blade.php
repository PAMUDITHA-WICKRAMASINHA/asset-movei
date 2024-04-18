<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Movie')</title>

    @include('layout.style')

</head>

<body>
    @include('layout.header.secound')
    <div id="main">
        @yield('content')
    </div>
    @include('layout.footer.index')
    @include('layout.script')

</body>

</html>