<a href="{{ URL::to('/') }}">
    Home
</a>
<a href="{{ URL::route('board_list') }}">
    Boards
</a>|
@if (Auth::user())
    Logged as {{Auth::user()->name}}
    <a href=" {{ URL::route('logout') }}">
       Logout
    </a>|
@else
<a href="{{ URL::route('login') }}">
    Login
</a>
|
<a href="/register">
    Register
</a>
@endif