<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Movies')</title>
    <style>
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: $header-footer-color;
    }

    ::-webkit-scrollbar-thumb {
        background: $red-color;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgb(220, 0, 0);
    }

    * {
        margin: 0;
        padding: 0;
        list-style: none;
        border: 0;
        outline: 0;
        -webkit-tap-highlight-color: transparent;
        text-decoration: none;
        color: inherit;
        box-sizing: border-box;
    }

    *:focus {
        outline: 0;
    }

    body {
        font-family: "Raleway", sans-serif;
    }
    </style>
    @include('admin.style')

</head>

<body>
    @include('admin.header.index')
    <div id="main">
        @yield('admin_content')
    </div>
    @include('admin.footer.index')
    @include('admin.script')

</body>

</html>