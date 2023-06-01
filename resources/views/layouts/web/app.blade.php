<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.web.css')
    </head>
    <body>
        @include('layouts.web.header')

        @yield('site_content')



        @include('layouts.web.js')

    </body>
</html>
