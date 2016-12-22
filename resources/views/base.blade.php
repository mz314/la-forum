<html>

    <head>
        <title>@yield('title')</title>
        @section('css')
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        @show

        @section('js')
        <script src="{{ URL::asset('js/app.js') }}">
        </script>
        @show
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