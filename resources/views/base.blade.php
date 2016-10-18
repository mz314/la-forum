<html>

    <head>
        <title>@yield('title')</title>
    </head>

    <body>

        <div class="header">
        @section('header')
        @include('header')
        @show
        </div>

        <div class="content">
        @yield('content')
        </div>



    </body>
</html>