<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Movie')</title>

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